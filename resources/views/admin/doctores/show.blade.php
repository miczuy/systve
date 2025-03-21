@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-cyan-50 to-blue-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group">
            <!-- Encabezado con efecto vidrio médico mejorado -->
            <div class="relative bg-gradient-to-r from-cyan-600 via-blue-600 to-blue-700 px-10 pt-10 pb-14 overflow-hidden">
                <!-- Patrón de fondo mejorado -->
                <div class="absolute inset-0 opacity-10">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <pattern id="medical-dots" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="1" fill="currentColor" />
                                <circle cx="8" cy="8" r="1.5" fill="currentColor" />
                                <circle cx="14" cy="14" r="1" fill="currentColor" />
                            </pattern>
                            <pattern id="medical-cross" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M20 10v20M10 20h20" stroke="currentColor" stroke-width="2" />
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#medical-dots)" />
                        <rect width="100%" height="100%" fill="url(#medical-cross)" opacity="0.3" />
                    </svg>
                </div>

                <!-- Elementos decorativos flotantes -->
                <div class="absolute top-16 right-12 w-32 h-32 rounded-full bg-gradient-to-br from-blue-400/20 to-cyan-300/10 blur-3xl"></div>
                <div class="absolute bottom-8 left-10 w-40 h-40 rounded-full bg-gradient-to-tr from-blue-400/20 to-cyan-300/10 blur-3xl"></div>

                <!-- Contenido del encabezado -->
                <div class="relative flex flex-col md:flex-row items-center md:justify-between gap-8">
                    <div class="flex items-center gap-6">
                        <div class="p-5 bg-white/15 rounded-full backdrop-blur-sm border border-white/30 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-3">
                                <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Dr. {{ $doctor->nombres }} {{ $doctor->apellidos }}</h1>
                                <span class="px-3 py-1 bg-blue-500/20 backdrop-blur-sm rounded-full text-xs font-medium text-white border border-blue-400/20 whitespace-nowrap">
                                    @if($doctor->specialties->count() > 0)
                                        {{ $doctor->specialties->first()->nombre }}
                                    @else
                                        Médico
                                    @endif
                                </span>
                            </div>
                            <p class="mt-1 text-blue-100/90 font-light">Ficha completa del profesional médico</p>
                        </div>
                    </div>

                    <!-- Insignia de estado -->
                    <div class="hidden md:flex items-center gap-2 bg-blue-500/20 backdrop-blur-sm px-4 py-2 rounded-full border border-blue-400/20">
                        <span class="flex h-2.5 w-2.5 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        <span class="text-white/95 text-sm font-medium">Registro activo</span>
                    </div>
                </div>
            </div>

            <div class="px-8 py-8 md:px-12 space-y-8">
                <!-- Sección de Información Principal -->
                <div class="bg-gradient-to-br from-white to-slate-50/40 rounded-2xl p-7 shadow-sm border border-slate-100">
                    <div class="flex items-center space-x-3 border-b border-slate-200 pb-4 mb-6">
                        <div class="p-2 bg-cyan-100 rounded-lg">
                            <svg class="w-5 h-5 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-cyan-900">Información Personal</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nombres -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-500 ml-1">Nombres</label>
                            <div class="px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->nombres }}</p>
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-500 ml-1">Apellidos</label>
                            <div class="px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->apellidos }}</p>
                            </div>
                        </div>

                        <!-- Cédula -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-500 ml-1">Cédula</label>
                            <div class="flex gap-2">
                                <div class="w-20 px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm flex items-center justify-center">
                                    <p class="font-medium text-slate-800">{{ explode('-', $doctor->cedula)[0] }}</p>
                                </div>
                                <div class="flex-1 px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm">
                                    <p class="font-medium text-slate-800">{{ explode('-', $doctor->cedula)[1] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-500 ml-1">Teléfono</label>
                            <div class="px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm flex items-center">
                                <svg class="w-4 h-4 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <p class="font-medium text-slate-800">{{ $doctor->telefono }}</p>
                            </div>
                        </div>

                        <!-- Licencia Médica -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-500 ml-1">Licencia Médica</label>
                            <div class="px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm flex items-center">
                                <svg class="w-4 h-4 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="font-medium text-slate-800">{{ $doctor->licencia_medica }}</p>
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-500 ml-1">Correo Electrónico</label>
                            <div class="px-4 py-3.5 bg-white rounded-xl ring-1 ring-cyan-100 shadow-sm flex items-center">
                                <svg class="w-4 h-4 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <p class="font-medium text-slate-800">{{ $doctor->user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Especialidades -->
                <div class="bg-gradient-to-br from-white to-blue-50/40 rounded-2xl p-7 shadow-sm border border-blue-100/70">
                    <div class="flex items-center space-x-3 border-b border-blue-200/50 pb-4 mb-6">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900">Especialidades Médicas</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="flex flex-wrap gap-2.5 px-5 py-4 bg-white rounded-xl ring-1 ring-blue-100 shadow-sm">
                            @forelse($doctor->specialties as $specialty)
                                <span class="px-4 py-2 bg-gradient-to-br from-blue-50 to-cyan-50 text-blue-700 text-sm font-medium rounded-lg border border-blue-200/70 flex items-center gap-2 shadow-sm">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    {{ $specialty->nombre }}
                                </span>
                            @empty
                                <div class="w-full flex items-center gap-3 text-slate-400 py-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="italic">Sin especialidades registradas</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Información adicional -->
                        <div class="bg-blue-50/80 rounded-xl px-5 py-4 flex items-start gap-3 border border-blue-100/70">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="text-sm text-blue-700">
                                <p class="font-medium text-blue-800">Información sobre especialidades</p>
                                <p class="mt-1">Las especialidades médicas indican las áreas específicas de competencia del doctor. Cada especialidad requiere una certificación adicional y entrenamiento específico.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Estadísticas y Horarios (Opcional, se puede eliminar si no se necesita) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Datos de Actividad -->
                    <div class="bg-gradient-to-br from-white to-cyan-50/30 rounded-2xl p-6 shadow-sm border border-cyan-100/50">
                        <div class="flex items-center space-x-3 border-b border-cyan-200/40 pb-3 mb-4">
                            <div class="p-1.5 bg-cyan-100 rounded-lg">
                                <svg class="w-4 h-4 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-semibold text-cyan-900">Resumen de Actividad</h3>
                        </div>

                        <div class="space-y-3">
                            <!-- Experiencia -->
                            <div class="flex items-center justify-between py-2.5 px-4 bg-white rounded-lg ring-1 ring-cyan-100 shadow-sm">
                                <div class="flex items-center gap-2.5">
                                    <div class="p-1.5 bg-cyan-100 rounded-full">
                                        <svg class="w-3.5 h-3.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-slate-600">Fecha de registro</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">{{ $doctor->created_at->format('d/m/Y') }}</span>
                            </div>

                            <!-- Especialidades -->
                            <div class="flex items-center justify-between py-2.5 px-4 bg-white rounded-lg ring-1 ring-cyan-100 shadow-sm">
                                <div class="flex items-center gap-2.5">
                                    <div class="p-1.5 bg-cyan-100 rounded-full">
                                        <svg class="w-3.5 h-3.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-slate-600">Especialidades</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">{{ $doctor->specialties->count() }}</span>
                            </div>

                            <!-- Estado -->
                            <div class="flex items-center justify-between py-2.5 px-4 bg-white rounded-lg ring-1 ring-cyan-100 shadow-sm">
                                <div class="flex items-center gap-2.5">
                                    <div class="p-1.5 bg-cyan-100 rounded-full">
                                        <svg class="w-3.5 h-3.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-slate-600">Estado</span>
                                </div>
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Activo</span>
                            </div>
                        </div>
                    </div>

                    <!-- Opciones -->
                    <div class="bg-gradient-to-br from-white to-slate-50/40 rounded-2xl p-6 shadow-sm border border-slate-100/70">
                        <div class="flex items-center space-x-3 border-b border-slate-200/40 pb-3 mb-4">
                            <div class="p-1.5 bg-slate-100 rounded-lg">
                                <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-semibold text-slate-800">Opciones</h3>
                        </div>

                        <div class="space-y-4">
                            <a href="{{ url('admin/doctores/' . $doctor->id . '/edit') }}" class="flex items-center justify-between py-3 px-5 bg-white rounded-xl ring-1 ring-slate-200 shadow-sm hover:bg-slate-50 transition-colors group">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-slate-100 rounded-lg group-hover:bg-blue-100 transition-colors">
                                        <svg class="w-4 h-4 text-slate-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-blue-700 transition-colors">Editar información</span>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <a href="{{ url('admin/horarios/create?doctor_id=' . $doctor->id) }}" class="flex items-center justify-between py-3 px-5 bg-white rounded-xl ring-1 ring-slate-200 shadow-sm hover:bg-slate-50 transition-colors group">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-slate-100 rounded-lg group-hover:bg-cyan-100 transition-colors">
                                        <svg class="w-4 h-4 text-slate-600 group-hover:text-cyan-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-slate-700 group-hover:text-cyan-700 transition-colors">Gestionar horarios</span>
                                </div>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-cyan-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 pt-6 border-t border-slate-100">
                    <a href="{{ url('admin/doctores') }}" class="px-8 py-3.5 bg-gradient-to-br from-slate-500 to-slate-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                        </svg>
                        <span class="font-medium">Volver al Listado</span>
                    </a>

                    <a href="{{ url('admin/doctores/create') }}" class="px-8 py-3.5 bg-gradient-to-br from-cyan-500 to-blue-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-medium">Registrar Nuevo Doctor</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
