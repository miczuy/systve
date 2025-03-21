@extends('layouts.admin')

@section('content')
    <div class="py-12 bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header con navegación de rastro -->
            <div class="mb-6 px-4 sm:px-0">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('admin.historial.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2">
                                    Historial
                                </a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-indigo-500 md:ml-2">Detalles de visita</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Card principal -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Header con gradiente -->
                <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-5">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </span>
                            <h1 class="ml-3 text-2xl font-bold text-white tracking-tight">Visita Médica - #{{ $visita->id }}</h1>
                        </div>
                        <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
                            {{ $visita->estado == 'Completada' ? 'bg-green-100 text-green-800' :
                            ($visita->estado == 'Programada' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">

                            @if($visita->estado == 'Completada')
                                <svg class="-ml-0.5 mr-1.5 h-3 w-3 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                            @elseif($visita->estado == 'Programada')
                                <svg class="-ml-0.5 mr-1.5 h-3 w-3 text-blue-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                            @else
                                <svg class="-ml-0.5 mr-1.5 h-3 w-3 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                            @endif
                            {{ $visita->estado }}
                        </span>
                            <a href="{{ url()->previous() }}" class="group relative inline-flex items-center overflow-hidden rounded-lg bg-white/10 px-3 py-1.5 text-sm font-medium text-white backdrop-blur-sm transition hover:bg-white/20">
                            <span class="mr-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </span>
                                Volver
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="p-6 space-y-8">
                    <!-- Resumen de la visita -->
                    <div class="relative overflow-hidden rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 p-6 shadow-sm">
                        <div class="absolute right-0 top-0 -mt-10 -mr-10 h-32 w-32 rounded-full bg-blue-100/80 opacity-20"></div>
                        <div class="absolute left-0 bottom-0 -mb-10 -ml-10 h-32 w-32 rounded-full bg-indigo-100/80 opacity-20"></div>

                        <div class="relative">
                            <h2 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600 mr-3">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                                Resumen de la Visita
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-4">
                                <div class="flex flex-col">
                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">Fecha</span>
                                    <span class="mt-1.5 text-sm font-medium text-gray-900">{{ $visita->fecha_visita->format('d/m/Y') }}</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">Hora</span>
                                    <span class="mt-1.5 text-sm font-medium text-gray-900">{{ $visita->hora_visita->format('H:i') }} hrs</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">Doctor</span>
                                    <span class="mt-1.5 text-sm font-medium text-gray-900">Dr. {{ $visita->doctor->nombres ?? '' }} {{ $visita->doctor->apellidos ?? '' }}</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">Mascota</span>
                                    <span class="mt-1.5 text-sm font-medium text-gray-900">{{ $visita->mascota->nombre }} ({{ $visita->mascota->especie }})</span>
                                </div>

                                <div class="sm:col-span-2 lg:col-span-4">
                                    <span class="text-xs font-medium uppercase tracking-wide text-gray-500">Motivo de consulta</span>
                                    <p class="mt-1.5 text-sm text-gray-700">{{ $visita->motivo_consulta }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Datos principales en cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Card de Mascota -->
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm transition hover:shadow-md">
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-5 py-4 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-900 flex items-center">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-500/10 mr-2">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                                    Información de la Mascota
                                </h3>
                            </div>

                            <div class="p-5">
                                <div class="grid grid-cols-2 gap-5">
                                    <div class="space-y-3">
                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Nombre</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->mascota->nombre }}</span>
                                        </div>

                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Especie</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->mascota->especie }}</span>
                                        </div>

                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Raza</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->mascota->raza ?: 'No especificada' }}</span>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Edad</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->mascota->edad ? $visita->mascota->edad . ' años' : 'No especificada' }}</span>
                                        </div>

                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Peso actual</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->peso ? $visita->peso . ' kg' : 'No registrado' }}</span>
                                        </div>

                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Temperatura</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->temperatura ? $visita->temperatura . ' °C' : 'No registrada' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card del Veterinario -->
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm transition hover:shadow-md">
                            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 px-5 py-4 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-900 flex items-center">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-indigo-500/10 mr-2">
                                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                    Información del Veterinario
                                </h3>
                            </div>

                            <div class="p-5">
                                <div class="space-y-5">
                                    <div>
                                        <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Nombre completo</span>
                                        <span class="block mt-1 text-sm font-medium text-gray-900">Dr. {{ $visita->doctor->nombres ?? '' }} {{ $visita->doctor->apellidos ?? '' }}</span>
                                    </div>

                                    <div>
                                        <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Especialidad</span>
                                        <span class="block mt-1 text-sm font-medium text-gray-900">
                                        @if($visita->specialty_id)
                                                {{ optional(\App\Models\Specialty::find($visita->specialty_id))->nombre ?? 'No especificada' }}
                                            @elseif($visita->doctor && $visita->doctor->specialties->count() > 0)
                                                {{ $visita->doctor->specialties->pluck('nombre')->join(', ') }}
                                            @else
                                                No especificada
                                            @endif
                                    </span>
                                    </div>

                                    @if($visita->doctor && $visita->doctor->telefono)
                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Teléfono de contacto</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->doctor->telefono }}</span>
                                        </div>
                                    @endif

                                    @if($visita->doctor && $visita->doctor->email)
                                        <div>
                                            <span class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Correo electrónico</span>
                                            <span class="block mt-1 text-sm font-medium text-gray-900">{{ $visita->doctor->email }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detalles médicos -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-5 py-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-900 flex items-center">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-indigo-500/10 mr-2">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </span>
                                Detalles Médicos
                            </h3>
                        </div>

                        <div class="divide-y divide-gray-200">
                            <!-- Síntomas -->
                            <div class="px-5 py-4 hover:bg-gray-50/50 transition">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 pt-1">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-900">Síntomas</h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ $visita->sintomas ?: 'No se registraron síntomas' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Diagnóstico -->
                            <div class="px-5 py-4 hover:bg-gray-50/50 transition">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 pt-1">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-green-50 text-green-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-900">Diagnóstico</h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ $visita->diagnostico ?: 'No se registró diagnóstico' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tratamiento -->
                            <div class="px-5 py-4 hover:bg-gray-50/50 transition">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 pt-1">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-purple-50 text-purple-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                        </svg>
                                    </span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-900">Tratamiento</h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ $visita->tratamiento ?: 'No se indicó tratamiento' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Observaciones -->
                            <div class="px-5 py-4 hover:bg-gray-50/50 transition">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 pt-1">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-yellow-50 text-yellow-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-900">Observaciones</h4>
                                        <p class="mt-1 text-sm text-gray-500">{{ $visita->observaciones ?: 'No hay observaciones adicionales' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Fecha de seguimiento, si existe -->
                            @if($visita->fecha_seguimiento)
                                <div class="px-5 py-4 hover:bg-gray-50/50 transition">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 pt-1">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-sm font-medium text-gray-900">Fecha de seguimiento</h4>
                                            <p class="mt-1 text-sm text-gray-500">{{ $visita->fecha_seguimiento->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.mascotas.edit', $visita->mascota_id) }}"
                           class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-lg shadow-sm hover:from-blue-700 hover:to-indigo-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-all">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            Ver ficha de la mascota
                        </a>

                        @if($visita->estado == 'Completada')
                            <a href="{{ route('admin.historial.porMascota', $visita->mascota_id) }}"
                               class="inline-flex items-center justify-center px-5 py-2.5 bg-indigo-50 text-indigo-700 text-sm font-medium rounded-lg border border-indigo-200 hover:bg-indigo-100 focus:ring-4 focus:ring-indigo-100 focus:outline-none transition-all">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                Ver historial médico
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
