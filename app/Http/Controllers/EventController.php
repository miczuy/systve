<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Mascota;
use App\Models\Paciente;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Event::with(['doctor', 'user', 'consultorio'])
            ->orderBy('start', 'desc')
            ->get();

        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener el paciente autenticado
        $user = auth()->user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente) {
            return redirect()->route('home')
                ->with('mensaje', 'No tienes un perfil de paciente configurado')
                ->with('icono', 'error');
        }

        // Obtener las mascotas activas del paciente
        $mascotas = Mascota::where('paciente_id', $paciente->id)
            ->where('estado', 'Activo')
            ->get();

        // Obtener consultorios activos
        $consultorios = Consultorio::where('estado', 1)->get();

        // Otros datos que puedas necesitar para el formulario
        $doctores = Doctor::all(); // O alguna otra lógica específica

        return view('paciente.citas.create', compact('mascotas', 'consultorios', 'doctores'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|string', // Hora en formato 12 horas (1:00 PM)
            'doctor_id' => 'required|exists:doctors,id',
            'mascota_id' => 'nullable|exists:mascotas,id', // Ahora es opcional
        ]);

        // Convertir la hora de 12 horas (AM/PM) a 24 horas usando Carbon
        try {
            $horaReserva = Carbon::createFromFormat('h:i A', $request->hora_reserva); // Convierte a objeto Carbon
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Formato de hora no válido.')
                ->with('icono', 'error');
        }

        // Definir el rango de horas permitido
        $horaPermitidaInicio = Carbon::createFromTime(8, 0); // 8:00 AM
        $horaPermitidaFin = Carbon::createFromTime(18, 0);   // 6:00 PM

        // Verificar si la hora está dentro del rango permitido
        if ($horaReserva->lt($horaPermitidaInicio) || $horaReserva->gt($horaPermitidaFin)) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'El horario no está dentro del rango permitido (8:00 AM - 6:00 PM).')
                ->with('icono', 'error');
        }

        // Obtener el día de la semana de la fecha de reserva
        $diaReserva = Carbon::parse($request->fecha_reserva)->format('l'); // 'l' devuelve el nombre completo del día

        // Traducir el día al formato que usa la base de datos
        $diaReservaTraducido = $this->traducir_dia($diaReserva);

        // Obtener el horario del doctor para ese día
        $horarioDoctor = Horario::where('doctor_id', $request->doctor_id)
            ->where('dia', $diaReservaTraducido)
            ->first();

        // Verificar si el doctor trabaja ese día
        if (!$horarioDoctor) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'El doctor no atiende el día ' . $diaReservaTraducido . '.')
                ->with('icono', 'error');
        }

        // Verificar si la hora está dentro del horario del doctor
        try {
            // Intentar crear objetos Carbon a partir de las horas almacenadas
            // Usamos un bloque try/catch para manejar posibles formatos diferentes
            $horaInicio = Carbon::parse($horarioDoctor->hora_inicio);
            $horaFin = Carbon::parse($horarioDoctor->hora_fin);

            // Solo comparamos las horas y minutos, no la fecha
            $horaReservaComparar = Carbon::today()->setHour($horaReserva->hour)->setMinute($horaReserva->minute);
            $horaInicioComparar = Carbon::today()->setHour($horaInicio->hour)->setMinute($horaInicio->minute);
            $horaFinComparar = Carbon::today()->setHour($horaFin->hour)->setMinute($horaFin->minute);

            if ($horaReservaComparar->lt($horaInicioComparar) || $horaReservaComparar->gt($horaFinComparar)) {
                return redirect()->back()
                    ->withInput()
                    ->with('mensaje', 'La hora seleccionada (' . $horaReserva->format('h:i A') . ') está fuera del horario de atención del doctor para ese día (' . $horaInicio->format('h:i A') . ' - ' . $horaFin->format('h:i A') . ').')
                    ->with('icono', 'error');
            }
        } catch (\Exception $e) {
            // Si hay un error al parsear las horas, lo capturamos y mostramos un mensaje de error
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Error al verificar el horario del doctor: ' . $e->getMessage())
                ->with('icono', 'error');
        }

        // Formatear la hora a 24 horas (sin segundos)
        $horaReserva24 = $horaReserva->format('H:i');

        // Combinar la fecha y la hora para crear el campo `start`
        $fecha_hora_reserva = $request->fecha_reserva . " " . $horaReserva24;

        // Validar si ya existe un evento ACTIVO en la misma fecha y hora para el mismo doctor
        $eventos_duplicados = Event::where('doctor_id', $request->doctor_id)
            ->where('start', $fecha_hora_reserva)
            ->whereIn('estado', ['pendiente', 'atendida']) // Solo verificar citas no canceladas
            ->exists();

        if ($eventos_duplicados) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe una reserva activa con el mismo doctor en esa fecha y hora.')
                ->with('icono', 'error');
        }

        // Obtener el doctor por su ID
        $doctor = Doctor::find($request->doctor_id);

        // Nombre del paciente/propietario (utilizamos el nombre del usuario)
        $nombrePaciente = Auth::user()->name;

        // Crear el evento
        try {
            // Al crear el evento, incluir mascota_id si existe
            $evento = new Event();

            // Definimos el título basado en si hay mascota o no
            if ($request->filled('mascota_id')) {
                $mascota = \App\Models\Mascota::find($request->mascota_id);
                $evento->title = $horaReserva->format('h:i A') . " - Cita con el doctor " . $doctor->nombres . " para " . $mascota->nombre;
                $evento->mascota_id = $request->mascota_id; // Guardar el ID de la mascota
            } else {
                $evento->title = $horaReserva->format('h:i A') . " - Cita con el doctor " . $doctor->nombres . " para " . $nombrePaciente;
                // No asignamos mascota_id si no se proporcionó
            }

            $evento->start = $fecha_hora_reserva;
            $evento->end = $fecha_hora_reserva;
            $evento->color = '#e82216';
            $evento->user_id = Auth::user()->id;
            $evento->doctor_id = $request->doctor_id;
            $evento->consultorio_id = 1;
            $evento->estado = 'pendiente';
            $evento->save();

            return redirect()->route('admin.index')
                ->with('mensaje', 'Se registró la reserva de la cita médica correctamente.')
                ->with('icono', 'success');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ocurrió un error al guardar la reserva: ' . $e->getMessage())
                ->with('icono', 'error');
        }
    }

    private function traducir_dia($dia)
    {
        $dias = [
            'Monday' => 'LUNES',
            'Tuesday' => 'MARTES',
            'Wednesday' => 'MIERCOLES',
            'Thursday' => 'JUEVES',
            'Friday' => 'VIERNES',
            'Saturday' => 'SABADO',
            'Sunday' => 'DOMINGO',
        ];
        return $dias[$dia] ?? $dia;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->estado = 'cancelada';
            $event->save();

            return redirect()->back()->with([
                'mensaje' => 'La cita ha sido cancelada correctamente',
                'icono' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'mensaje' => 'No se encontró la cita',
            'icono' => 'error',
        ]);
    }

    /**
     * Marca una cita como atendida
     */
    public function marcarComoAtendida($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->estado = 'atendida';
            $event->save();

            return redirect()->back()->with([
                'mensaje' => 'La cita ha sido marcada como atendida',
                'icono' => 'success',
            ]);
        }

        return redirect()->back()->with([
            'mensaje' => 'No se encontró la cita',
            'icono' => 'error',
        ]);
    }

    /**
     * Muestra la página de reportes con estadísticas
     */
    public function reportes()
    {
        // Total de citas (todas, incluyendo canceladas)
        $totalCitas = Event::count();

        // Citas atendidas: aquellas con estado 'atendida'
        $citasAtendidas = Event::where('estado', 'atendida')->count();

        // Citas pendientes: aquellas con estado 'pendiente'
        $citasPendientes = Event::where('estado', 'pendiente')->count();

        // Citas canceladas: aquellas con estado 'cancelada'
        $citasCanceladas = Event::where('estado', 'cancelada')->count();

        return view('admin.reservas.reportes', compact('totalCitas', 'citasAtendidas',
            'citasPendientes', 'citasCanceladas'));
    }

    /**
     * Genera un PDF con todas las citas
     */
    public function pdf()
    {
        $configuracion = Configuracione::latest()->first();
        $eventos = Event::all();

        $pdf = \PDF::loadView('admin.reservas.pdf', compact('configuracion','eventos'));

        // Incluir la numeración de páginas y el pie de página
        // $pdf->output();
        // $dompdf = $pdf->getDomPDF();
        //$canvas = $dompdf->getCanvas();
        //$canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        //  $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        //$canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }

    /**
     * Genera un PDF con citas entre dos fechas
     */
    public function pdf_fechas(Request $request)
    {


        //$datos = request()->all();
        //return response()->json($datos);
        $doctores = Doctor::with('specialties')->get(); // Cargar las especialidades junto con los doctores
        $configuracion = Configuracione::latest()->first();

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $eventos = Event::whereBetween('start',[$fecha_inicio, $fecha_fin])->get();

        $pdf = \PDF::loadView('admin.reservas.pdf_fechas', compact('configuracion','eventos','fecha_inicio','fecha_fin','doctores'));

        // Incluir la numeración de páginas y el pie de página
        ///$pdf->output();
        //$dompdf = $pdf->getDomPDF();
        //$canvas = $dompdf->getCanvas();
        //$canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        //$canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        //$canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }
}
