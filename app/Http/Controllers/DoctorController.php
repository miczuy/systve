<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Doctor::with('user', 'specialties')->whereHas('user', function ($query) {
            $query->where('status', true);
        });

        // Búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('cedula', 'like', "%{$search}%")
                    ->orWhere('telefono', 'like', "%{$search}%")
                    ->orWhere('licencia_medica', 'like', "%{$search}%");
            });
        }

        $doctores = $query->paginate(10); // 10 registros por página
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Export doctors to PDF.
     */
    public function exportPdf(Request $request)
    {
        $query = Doctor::with('user', 'specialties')->whereHas('user', function ($query) {
            $query->where('status', true);
        });

        // Aplicar los mismos filtros de búsqueda que en index
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('cedula', 'like', "%{$search}%")
                    ->orWhere('telefono', 'like', "%{$search}%")
                    ->orWhere('licencia_medica', 'like', "%{$search}%");
            });
        }

        $doctores = $query->get();

        $configuracion = Configuracione::latest()->first();
        $pdf = PDF::loadView('admin.doctores.pdf', compact('doctores', 'configuracion'));

        //Incluir la numerarion y pie de pagina

        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . date("d-m-Y H:i:s"), null, 10, array(0, 0, 0));
        $pdf->output();



        return $pdf->stream('doctores_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Specialty::all(); // Obtener todas las especialidades
        return view('admin.doctores.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cedulaCompleta = $request->input('nacionalidad') . '-' . $request->input('cedula');

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|string|max:100',
            'telefono' => 'required',
            'licencia_medica' => 'required',
            'specialty_ids' => 'required|array',
            'specialty_ids.*' => 'exists:specialties,id',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        try {
            // Crear usuario
            $usuario = new User();
            $usuario->name = $request->nombres;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request['password']);
            $usuario->status = true; // Asegurar que el usuario sea activo
            $usuario->save();

            // Crear doctor
            $doctor = new Doctor();
            $doctor->user_id = $usuario->id;
            $doctor->nombres = $request->nombres;
            $doctor->apellidos = $request->apellidos;
            $doctor->cedula = $cedulaCompleta;
            $doctor->telefono = $request->telefono;
            $doctor->licencia_medica = $request->licencia_medica;
            $doctor->save();

            // Asignar especialidades
            $doctor->specialties()->attach($request->specialty_ids);

            $usuario->assignRole('doctor');

            return redirect()->route('admin.doctores.index')
                ->with('mensaje', 'Se registró el doctor correctamente.')
                ->with('icono', 'success');

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->route('admin.doctores.create')
                    ->with('mensaje', 'El correo ya está registrado. Intenta con otro.')
                    ->with('icono', 'error');
            }
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::with('specialties')->findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::with('specialties')->findOrFail($id);
        $specialties = Specialty::all();
        return view('admin.doctores.edit', compact('doctor', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required|string|max:100',
            'telefono' => 'required',
            'licencia_medica' => 'required',
            'specialty_ids' => 'required|array',
            'specialty_ids.*' => 'exists:specialties,id',
            'email' => 'required|max:250|unique:users,email,' . $doctor->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        // Actualizar doctor
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->cedula = $request->input('nacionalidad') . '-' . $request->input('cedula');
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->save();

        // Actualizar usuario
        $usuario = $doctor->user;
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        // Sincronizar especialidades
        $doctor->specialties()->sync($request->specialty_ids);

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se actualizaron los datos del doctor correctamente.')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        // Buscar el doctor por ID, incluyendo la relación con el usuario
        $doctor = Doctor::with('user')->findOrFail($id);

        // Retornar la vista de confirmación de eliminación, pasando el doctor encontrado
        return view('admin.doctores.delete', compact('doctor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->user->delete(); // Eliminar el usuario asociado
        $doctor->delete(); // Eliminar el doctor

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se eliminó al doctor correctamente.')
            ->with('icono', 'success');
    }
}
