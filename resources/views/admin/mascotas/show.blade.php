<!-- resources/views/admin/mascotas/show.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Cabecera con un diseño más elegante -->
        <div class="relative bg-gradient-to-r from-indigo-600 to-purple-700 rounded-3xl mb-10 overflow-hidden shadow-xl">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center p-8">
                <div class="space-y-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-800 text-white">
                        Ficha de Mascota
                    </span>
                    <h1 class="text-3xl md:text-4xl font-bold text-white">
                        {{ $mascota->nombre }}
                    </h1>
                    <p class="text-indigo-100">
                        Paciente de {{ $mascota->paciente->nombres }} {{ $mascota->paciente->apellidos }}
                    </p>
                </div>
                <div class="flex flex-wrap gap-3 mt-4 md:mt-0">
                    <a href="{{ route('admin.mascotas.index') }}" class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg hover:bg-white/20 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver al listado
                    </a>
                    @can('admin.mascotas.edit')
                        <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="inline-flex items-center gap-2 bg-white text-indigo-700 px-4 py-2 rounded-lg shadow-sm hover:bg-indigo-50 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Editar mascota
                        </a>
                    @endcan
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500"></div>
        </div>

        @if(session('mensaje'))
            <div class="bg-{{ session('icono') === 'success' ? 'green' : 'red' }}-50 border-l-4 border-{{ session('icono') === 'success' ? 'green' : 'red' }}-500 text-{{ session('icono') === 'success' ? 'green' : 'red' }}-700 p-4 rounded-lg shadow-sm mb-6 animate-fadeIn" role="alert">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ session('icono') === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}" />
                    </svg>
                    <p class="font-medium">{{ session('mensaje') }}</p>
                </div>
            </div>
        @endif

        <!-- Información principal en un diseño de tarjeta con un borde más suave y sombras elegantes -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <!-- Columna 1: Foto e información básica -->
            <div>
                <!-- Foto de mascota con diseño mejorado -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6 transform transition-all duration-300 hover:shadow-xl">
                    @if(isset($mascota->foto) && $mascota->foto)
                        <img src="{{url('storage/'.$mascota->foto) }}" alt="foto" class="w-full h-full object-contain">
                    @else
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    @endif

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-800">{{ $mascota->nombre }}</h2>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                {{ $mascota->estado == 'Activo' ? 'bg-green-100 text-green-800' :
                                    ($mascota->estado == 'Inactivo' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                <span class="h-2 w-2 rounded-full mr-2
                                {{ $mascota->estado == 'Activo' ? 'bg-green-400' :
                                    ($mascota->estado == 'Inactivo' ? 'bg-yellow-400' : 'bg-gray-400') }}"></span>
                                {{ $mascota->estado }}
                            </span>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500">Especie</span>
                                <span class="font-medium text-gray-900">{{ $mascota->especie }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500">Raza</span>
                                <span class="font-medium text-gray-900">{{ $mascota->raza ?? 'No especificada' }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500">Color</span>
                                <span class="font-medium text-gray-900">{{ $mascota->color ?? 'No especificado' }}</span>
                            </div>

                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-500">Sexo</span>
                                <span class="font-medium text-gray-900">{{ $mascota->sexo ?? 'No especificado' }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500">Edad</span>
                                <span class="font-medium text-gray-900">{{ $mascota->edad ?? 'No calculable' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Propietario -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 transform transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center mb-4">
                        <div class="p-3 rounded-full bg-indigo-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Propietario</h3>
                            <p class="text-indigo-600">{{ $mascota->paciente->apellidos }}, {{ $mascota->paciente->nombres }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna 2: Información médica -->
            <div class="space-y-6">
                <!-- Datos médicos -->
                <div class="bg-white rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-purple-100 text-purple-600 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-semibold text-gray-900">Datos médicos</h3>
                    </div>

                    <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Fecha de nacimiento</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="font-medium">{{ $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('d/m/Y') : 'No especificada' }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-1">Peso</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                                <p class="font-medium">{{ $mascota->peso ? $mascota->peso . ' kg' : 'No registrado' }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-1">Esterilizado</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="font-medium">{{ $mascota->esterilizado ? 'Sí' : 'No' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información médica específica -->
                <div class="bg-white rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-semibold text-gray-900">Información clínica</h3>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                Características especiales
                            </h4>
                            <p class="ml-5 text-gray-700">{{ $mascota->caracteristicas_especiales ?? 'No registradas' }}</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                Alergias
                            </h4>
                            <p class="ml-5 text-gray-700">{{ $mascota->alergias ?? 'No registradas' }}</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Condiciones médicas
                            </h4>
                            <p class="ml-5 text-gray-700">{{ $mascota->condiciones_medicas ?? 'No registradas' }}</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                                Medicación actual
                            </h4>
                            <p class="ml-5 text-gray-700">{{ $mascota->medicacion_actual ?? 'No registrada' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna 3: Próximas atenciones y alertas -->
            <div class="space-y-6">
                <!-- Próximas atenciones -->
                <div class="bg-white rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-amber-100 text-amber-600 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <h3 class="text-lg font-semibold text-gray-900">Próximas atenciones</h3>
                    </div>

                    @if($mascota->proximaVacuna || $mascota->proximaDesparasitacion)
                        <div class="space-y-4">
                            @if($mascota->proximaVacuna)
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl border border-blue-100">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-semibold text-blue-800">
                                                Vacuna
                                            </h4>
                                            <p class="mt-1 text-blue-600">{{ $mascota->proximaVacuna->nombre_vacuna }}</p>
                                            <div class="mt-2 flex items-center text-sm text-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $mascota->proximaVacuna->fecha_proxima->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($mascota->proximaDesparasitacion)
                                <div class="bg-gradient-to-r from-green-50 to-teal-50 p-4 rounded-xl border border-green-100">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-100 text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-semibold text-green-800">
                                                Desparasitación
                                            </h4>
                                            <p class="mt-1 text-green-600">{{ $mascota->proximaDesparasitacion->medicamento }}</p>
                                            <div class="mt-2 flex items-center text-sm text-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $mascota->proximaDesparasitacion->fecha_proxima->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center text-center py-6 bg-amber-50 rounded-xl">
                            <div class="w-16 h-16 rounded-full bg-amber-100 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-amber-800 font-medium">No hay próximas atenciones programadas</p>
                            <p class="text-amber-600 text-sm mt-1">Las citas futuras aparecerán aquí</p>
                        </div>
                    @endif
                </div>

                <!-- Resumen de historial -->
                <div class="bg-white rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Resumen de historial</h3>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between px-4 py-2 bg-indigo-50 rounded-lg">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                                <span>Vacunas</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ count($mascota->vacunas) }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between px-4 py-2 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Desparasitaciones</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ count($mascota->desparasitaciones) }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between px-4 py-2 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Visitas</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ count($mascota->visitas) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historial médico con tabs estilizados -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-6">
                <h2 class="text-xl font-bold text-white">Historial Médico</h2>
                <p class="text-purple-100 mt-1">Registro completo de la atención médica</p>
            </div>

            <div class="border-b border-gray-200 px-4">
                <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                    <button class="tab-button group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm border-indigo-500 text-indigo-600" data-target="vacunas-tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        Vacunas
                    </button>
                    <button class="tab-button group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="desparasitaciones-tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Desparasitaciones
                    </button>
                    <button class="tab-button group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="visitas-tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Historial de Citas
                    </button>
                </nav>
            </div>

            <!-- Pestaña Vacunas con estilo mejorado -->
            <div id="vacunas-tab" class="tab-content block p-6">
                @if(count($mascota->vacunas) > 0)
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">Vacuna</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aplicada</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Próxima</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lote</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">Veterinario</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($mascota->vacunas as $index => $vacuna)
                                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $vacuna->nombre_vacuna }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->fecha_aplicacion->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($vacuna->fecha_proxima)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    {{ $vacuna->fecha_proxima->format('d/m/Y') }}
                                                </span>
                                        @else
                                            <span class="text-gray-400">No programada</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->lote ?? 'No registrado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->veterinario ?? 'No registrado' }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-center bg-gray-50 rounded-xl">
                        <div class="w-20 h-20 rounded-full bg-indigo-100 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">Sin vacunas registradas</h3>
                        <p class="text-gray-500">No hay información sobre vacunas para esta mascota</p>
                    </div>
                @endif
            </div>

            <!-- Pestaña Desparasitaciones con estilo mejorado -->
            <div id="desparasitaciones-tab" class="tab-content hidden p-6">
                @if(count($mascota->desparasitaciones) > 0)
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">Medicamento</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aplicada</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Próxima</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso aplicación</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">Notas</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($mascota->desparasitaciones as $index => $desparasitacion)
                                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $desparasitacion->medicamento }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $desparasitacion->fecha_aplicacion->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($desparasitacion->fecha_proxima)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    {{ $desparasitacion->fecha_proxima->format('d/m/Y') }}
                                                </span>
                                        @else
                                            <span class="text-gray-400">No programada</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $desparasitacion->peso_aplicacion ? $desparasitacion->peso_aplicacion . ' kg' : 'No registrado' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $desparasitacion->notas ?? 'No hay notas' }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-center bg-gray-50 rounded-xl">
                        <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">Sin desparasitaciones registradas</h3>
                        <p class="text-gray-500">No hay información sobre desparasitaciones para esta mascota</p>
                    </div>
                @endif
            </div>

            <!-- Pestaña Historial de Citas con estilo mejorado -->
            <div id="visitas-tab" class="tab-content hidden p-6">
                @if(count($mascota->visitas) > 0)
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">Fecha</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Médico</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Motivo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">Detalles</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($mascota->visitas as $index => $visita)
                                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>{{ $visita->fecha_visita->format('d/m/Y') }}</span>
                                            <span class="ml-2 text-gray-400">{{ $visita->hora_visita->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $visita->doctor ? $visita->doctor->nombre : 'No asignado' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $visita->motivo_consulta }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ $visita->estado == 'Completada' ? 'bg-green-100 text-green-800' :
                                                    ($visita->estado == 'Programada' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                                <span class="h-1.5 w-1.5 rounded-full mr-1.5
                                                {{ $visita->estado == 'Completada' ? 'bg-green-400' :
                                                    ($visita->estado == 'Programada' ? 'bg-blue-400' : 'bg-red-400') }}"></span>
                                                {{ $visita->estado }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.visitas.show', $visita) }}" class="text-indigo-600 hover:text-indigo-900 inline-flex items-center group">
                                            Ver detalles
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-center bg-gray-50 rounded-xl">
                        <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">Sin citas registradas</h3>
                        <p class="text-gray-500">No hay citas o consultas registradas para esta mascota</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.12'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tabs functionality
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Reset all buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-indigo-600', 'border-indigo-500');
                        btn.classList.add('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'border-transparent');

                        // Actualizar ícono del botón
                        const svgIcon = btn.querySelector('svg');
                        if (svgIcon) {
                            svgIcon.classList.remove('text-indigo-500');
                            svgIcon.classList.add('text-gray-400', 'group-hover:text-gray-500');
                        }
                    });

                    // Activate clicked button
                    button.classList.remove('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'border-transparent');
                    button.classList.add('text-indigo-600', 'border-indigo-500');

                    // Actualizar ícono del botón seleccionado
                    const svgIcon = button.querySelector('svg');
                    if (svgIcon) {
                        svgIcon.classList.remove('text-gray-400', 'group-hover:text-gray-500');
                        svgIcon.classList.add('text-indigo-500');
                    }

                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show selected tab content with fade effect
                    const targetId = button.getAttribute('data-target');
                    const targetContent = document.getElementById(targetId);
                    targetContent.classList.remove('hidden');
                    targetContent.classList.add('animate-fadeIn');
                });
            });
        });
    </script>
@endsection
