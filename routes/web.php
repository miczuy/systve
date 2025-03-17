<?php

use App\Http\Controllers\DesparasitacionMascotaController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\VacunaMascotaController;
use App\Http\Controllers\VisitaMascotaController;
use App\Http\Controllers\PacienteMascotaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas se cargan mediante el RouteServiceProvider y todas se
| asignan al grupo de middleware "web". ¡Haz algo genial!
|
*/

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// Rutas de inicio de sesión
Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);


// Rutas Configuracion
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracioneController::class, 'index'])->name('admin.configuraciones.index')->can('admin.configuraciones.index');
    Route::get('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracioneController::class, 'create'])->name('admin.configuraciones.create')->can('admin.configuraciones.create');
    Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracioneController::class, 'store'])->name('admin.configuraciones.store')->can('admin.configuraciones.store');
    Route::get('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'show'])->name('admin.configuraciones.show')->can('admin.configuraciones.show');
    Route::get('/admin/configuraciones/{id}/edit', [App\Http\Controllers\ConfiguracioneController::class, 'edit'])->name('admin.configuraciones.edit')->can('admin.configuraciones.edit');
    Route::put('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'update'])->name('admin.configuraciones.update')->can('admin.configuraciones.update');
    Route::delete('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'destroy'])->name('admin.configuraciones.destroy')->can('admin.configuraciones.destroy');
});


// Rutas de Usuarios
Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->can('admin.usuarios.index');
    Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->can('admin.usuarios.create');
    Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->can('admin.usuarios.store');
    Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->can('admin.usuarios.show');
    Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->can('admin.usuarios.edit');
    Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->can('admin.usuarios.update');
    Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->can('admin.usuarios.confirmDelete');
    Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->can('admin.usuarios.destroy');
    Route::patch('/admin/usuarios/{id}/toggle-status', [App\Http\Controllers\UsuarioController::class, 'toggleStatus'])->name('admin.usuarios.toggleStatus');
});

// Rutas de Enfermeras
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/enfermeras', [App\Http\Controllers\EnfermeraController::class, 'index'])->name('admin.enfermeras.index')->can('admin.enfermeras.index');
    Route::get('/admin/enfermeras/create', [App\Http\Controllers\EnfermeraController::class, 'create'])->name('admin.enfermeras.create')->can('admin.enfermeras.create');
    Route::post('/admin/enfermeras/create', [App\Http\Controllers\EnfermeraController::class, 'store'])->name('admin.enfermeras.store')->can('admin.enfermeras.store');
    Route::get('/admin/enfermeras/{id}', [App\Http\Controllers\EnfermeraController::class, 'show'])->name('admin.enfermeras.show')->can('admin.enfermeras.show');
    Route::get('/admin/enfermeras/{id}/edit', [App\Http\Controllers\EnfermeraController::class, 'edit'])->name('admin.enfermeras.edit')->can('admin.enfermeras.edit');
    Route::put('/admin/enfermeras/{id}', [App\Http\Controllers\EnfermeraController::class, 'update'])->name('admin.enfermeras.update')->can('admin.enfermeras.update');
    Route::get('/admin/enfermeras/{id}/confirm-delete', [App\Http\Controllers\EnfermeraController::class, 'confirmDelete'])->name('admin.enfermeras.confirmDelete')->can('admin.enfermeras.confirmDelete');
    Route::delete('/admin/enfermeras/{id}', [App\Http\Controllers\EnfermeraController::class, 'destroy'])->name('admin.enfermeras.destroy')->can('admin.enfermeras.destroy');
});

// Rutas de Pacientes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->can('admin.pacientes.index');
    Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->can('admin.pacientes.create');
    Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->can('admin.pacientes.store');
    Route::get('/admin/pacientes/export-pdf', [App\Http\Controllers\PacienteController::class, 'exportPdf'])->name('admin.pacientes.export-pdf')->can('admin.pacientes.export-pdf');
    Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->can('admin.pacientes.show');
    Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->can('admin.pacientes.edit');
    Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->can('admin.pacientes.update');
    Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->can('admin.pacientes.confirmDelete');
    Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->can('admin.pacientes.destroy');
});

// Rutas para perfil de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil.index')->middleware('can:perfil.index');
    Route::get('/perfil/editar', [App\Http\Controllers\PerfilController::class, 'editar'])->name('perfil.editar')->middleware('can:perfil.editar');
    Route::post('/perfil/actualizar', [App\Http\Controllers\PerfilController::class, 'actualizar'])->name('perfil.actualizar')->middleware('can:perfil.actualizar');
    Route::get('/perfil/cambiar-password', [App\Http\Controllers\PerfilController::class, 'cambiarPassword'])->name('perfil.cambiar-password')->middleware('can:perfil.cambiar-password');
    Route::post('/perfil/actualizar-password', [App\Http\Controllers\PerfilController::class, 'actualizarPassword'])->name('perfil.actualizar-password')->middleware('can:perfil.actualizar-password');
});


// Rutas de Consultorios
Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->can('admin.consultorios.index');
    Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->can('admin.consultorios.create');
    Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->can('admin.consultorios.store');
    Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->can('admin.consultorios.show');
    Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->can('admin.consultorios.edit');
    Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->can('admin.consultorios.update');
    Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->can('admin.consultorios.confirmDelete');
    Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->can('admin.consultorios.destroy');
    Route::patch('/admin/consultorios/{consultorio}/toggle-estado', [App\Http\Controllers\ConsultorioController::class, 'toggleEstado'])->name('admin.consultorios.toggleEstado');
});

// Rutas de Doctores
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->can('admin.doctores.index');
    Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->can('admin.doctores.create');
    Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->can('admin.doctores.store');
    Route::get('/admin/doctores/export-pdf', [App\Http\Controllers\DoctorController::class, 'exportPdf'])->name('admin.doctores.export-pdf')->can('admin.doctores.export-pdf');
    Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->can('admin.doctores.show');
    Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->can('admin.doctores.edit');
    Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->can('admin.doctores.update');
    Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->can('admin.doctores.confirmDelete');
    Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->can('admin.doctores.destroy');
});

// Rutas de Horarios
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')->can('admin.horarios.index');
    Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')->can('admin.horarios.create');
    Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')->can('admin.horarios.store');
    Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show')->can('admin.horarios.show');
    Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')->can('admin.horarios.edit');
    Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')->can('admin.horarios.update');
    Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->can('admin.horarios.confirmDelete');
    Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->can('admin.horarios.destroy');
});

// Rutas AJAX
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios');
});


// Rutas Usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/consultorios/{id}', [WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios')->can('cargar_datos_consultorios');
    Route::get('cargar_reserva_doctores/{id}', [WebController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')->can('cargar_reserva_doctores');
    Route::get('admin/ver_reservas/{id}', [AdminController::class, 'ver_reservas'])->name('ver_reservas')->can('ver_reservas');
    Route::post('admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.eventos.create')->can('admin.eventos.create');
    Route::delete('admin/eventos/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')->can('admin.eventos.destroy');
});


// Rutas para las reservas
Route::middleware(['auth'])->group(function () {
    // Rutas existentes
    Route::get('admin/reservas/reportes', [App\Http\Controllers\EventController::class, 'reportes'])->name('admin.reservas.reportes')->can('admin.reservas.reportes');
    // Nuevas rutas
    Route::put('admin/eventos/{id}/atender', [App\Http\Controllers\EventController::class, 'marcarComoAtendida'])->name('admin.eventos.atender')->can('admin.eventos.atender');

    // Ruta para generar PDF
    Route::get('admin/reservas/pdf', [App\Http\Controllers\EventController::class, 'pdf'])->name('admin.reservas.pdf')->can('admin.reservas.pdf');

    // Ruta para generar PDF con filtro de fechas
    Route::get('admin/reservas/pdf_fechas', [App\Http\Controllers\EventController::class, 'pdf_fechas'])->name('admin.reservas.pdf_fechas')->can('admin.reservas.pdf_fechas');
});

// Rutas para las el historial
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('admin.historial.index')->can('admin.historial.index');
    Route::get('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.historial.create')->can('admin.historial.create');
    Route::post('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'store'])->name('admin.historial.store')->can('admin.historial.store');
    Route::get('/admin/historial/export-pdf', [App\Http\Controllers\HistorialController::class, 'exportPdf'])->name('admin.historial.export-pdf')->can('admin.historial.export-pdf');
    Route::get('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'show'])->name('admin.historial.show')->can('admin.historial.show');
    Route::get('/admin/historial/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])->name('admin.historial.edit')->can('admin.historial.edit');
    Route::put('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'update'])->name('admin.historial.update')->can('admin.historial.update');
    Route::get('/admin/historial/{id}/confirm-delete', [App\Http\Controllers\HistorialController::class, 'confirmDelete'])->name('admin.historial.confirmDelete')->can('admin.historial.confirmDelete');
    Route::delete('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'destroy'])->name('admin.historial.destroy')->can('admin.historial.destroy');
});


// Rutas para mascotas (administración)
Route::middleware(['auth'])->group(function () {
    // CRUD de mascotas
    Route::get('/admin/mascotas', [MascotaController::class, 'index'])->name('admin.mascotas.index')->can('admin.mascotas.index');
    Route::get('/admin/mascotas/create', [MascotaController::class, 'create'])->name('admin.mascotas.create')->can('admin.mascotas.create');
    Route::post('/admin/mascotas', [MascotaController::class, 'store'])->name('admin.mascotas.store')->can('admin.mascotas.store');
    Route::get('/admin/mascotas/{mascota}', [MascotaController::class, 'show'])->name('admin.mascotas.show')->can('admin.mascotas.show');
    Route::get('/admin/mascotas/{mascota}/edit', [MascotaController::class, 'edit'])->name('admin.mascotas.edit')->can('admin.mascotas.edit');
    Route::put('/admin/mascotas/{mascota}', [MascotaController::class, 'update'])->name('admin.mascotas.update')->can('admin.mascotas.update');
    Route::get('/admin/mascotas/{mascota}/confirm-delete', [MascotaController::class, 'confirmDelete'])->name('admin.mascotas.confirmDelete')->can('admin.mascotas.confirmDelete');
    Route::delete('/admin/mascotas/{mascota}', [MascotaController::class, 'destroy'])->name('admin.mascotas.destroy')->can('admin.mascotas.destroy');

    // API para obtener mascotas por paciente
    Route::get('/admin/api/pacientes/{pacienteId}/mascotas', [MascotaController::class, 'getByPaciente'])->name('admin.mascotas.getByPaciente')->can('admin.mascotas.getByPaciente');

    // Rutas para vacunas
    Route::post('/admin/vacunas', [VacunaMascotaController::class, 'store'])->name('admin.vacunas.store')->can('admin.vacunas.store');
    Route::put('/admin/vacunas/{vacuna}', [VacunaMascotaController::class, 'update'])->name('admin.vacunas.update')->can('admin.vacunas.update');
    Route::delete('/admin/vacunas/{vacuna}', [VacunaMascotaController::class, 'destroy'])->name('admin.vacunas.destroy')->can('admin.vacunas.destroy');

    // Rutas para desparasitaciones
    Route::post('/admin/desparasitaciones', [DesparasitacionMascotaController::class, 'store'])->name('admin.desparasitaciones.store')->can('admin.desparasitaciones.store');
    Route::put('/admin/desparasitaciones/{desparasitacion}', [DesparasitacionMascotaController::class, 'update'])->name('admin.desparasitaciones.update')->can('admin.desparasitaciones.update');
    Route::delete('/admin/desparasitaciones/{desparasitacion}', [DesparasitacionMascotaController::class, 'destroy'])->name('admin.desparasitaciones.destroy')->can('admin.desparasitaciones.destroy');

    // Rutas para visitas
    Route::post('/admin/visitas', [VisitaMascotaController::class, 'store'])->name('admin.visitas.store')->can('admin.visitas.store');
    Route::get('/admin/visitas/{visita}', [VisitaMascotaController::class, 'show'])->name('admin.visitas.show')->can('admin.visitas.show');
    Route::put('/admin/visitas/{visita}', [VisitaMascotaController::class, 'update'])->name('admin.visitas.update')->can('admin.visitas.update');
    Route::delete('/admin/visitas/{visita}', [VisitaMascotaController::class, 'destroy'])->name('admin.visitas.destroy')->can('admin.visitas.destroy');

    // Rutas adicionales para historial vinculadas a mascotas
    Route::get('/admin/historial/mascota/{mascota}', [HistorialController::class, 'porMascota'])->name('admin.historial.porMascota')->can('admin.historial.show');
});

// Rutas para pacientes (acceso a sus propias mascotas)
Route::middleware(['auth'])->group(function () {
    Route::get('/paciente/mascotas', [PacienteMascotaController::class, 'index'])->name('paciente.mascotas.index')->can('ver.perfil.paciente');
    Route::get('/paciente/mascotas/{mascota}', [PacienteMascotaController::class, 'show'])->name('paciente.mascotas.show')->can('ver.perfil.paciente');
});
