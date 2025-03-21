@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50/40 flex items-center justify-center p-4 md:p-8">
        <div class="w-full max-w-3xl">
            <!-- Tarjeta Principal con diseño moderno y limpio -->
            <div class="w-full bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Indicador de color superior -->
                <div class="h-1.5 w-full bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-500"></div>

                <!-- Encabezado -->
                <div class="relative bg-gradient-to-r from-cyan-600 via-blue-700 to-blue-800 px-8 md:px-12 pt-10 pb-16">
                    <!-- Patrones de fondo sutiles -->
                    <div class="absolute inset-0 bg-medical-pattern opacity-10"></div>

                    <!-- Contenido principal del encabezado -->
                    <div class="relative flex flex-col items-center space-y-5 text-center">
                        <!-- Icono principal -->
                        <div class="flex items-center justify-center w-16 h-16 bg-white/15 rounded-full border border-white/30 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0zM12 6v.01M16.5 6v.01M7.5 6v.01"/>
                            </svg>
                        </div>

                        <!-- Título -->
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight font-playfair">Detalles del Horario</h1>
                            <p class="mt-2 text-blue-100 font-light tracking-wide">Programación médica detallada</p>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="px-8 md:px-12 py-10 space-y-8">
                    <!-- Sección de Información -->
                    <div class="bg-slate-50 rounded-xl p-7 border border-slate-100 transition-all duration-300 hover:shadow-md">
                        <!-- Encabezado de sección -->
                        <div class="flex items-center mb-6">
                            <div class="flex items-center justify-center w-10 h-10 bg-cyan-100 text-cyan-700 rounded-lg mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-cyan-800">Detalles de la Programación</h3>
                        </div>

                        <!-- Grid de información -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Día -->
                            <div class="group/item">
                                <label class="block text-sm font-medium text-slate-600 mb-2 ml-1 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 bg-cyan-50 text-cyan-600 rounded-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </span>
                                    Día de atención
                                </label>
                                <div class="px-5 py-4 bg-white rounded-lg border border-slate-200 shadow-sm group-hover/item:border-cyan-200 transition-colors duration-300">
                                    <p class="font-medium text-slate-800">{{ $horario->dia }}</p>
                                </div>
                            </div>

                            <!-- Horario -->
                            <div class="group/item">
                                <label class="block text-sm font-medium text-slate-600 mb-2 ml-1 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 bg-cyan-50 text-cyan-600 rounded-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </span>
                                    Horario
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="relative px-5 py-4 bg-white rounded-lg border border-slate-200 shadow-sm group-hover/item:border-cyan-200 transition-colors duration-300 flex items-center justify-center">
                                        <span class="absolute -top-2.5 left-2 px-2 py-0.5 bg-cyan-50 text-[10px] font-medium text-cyan-700 rounded-full">Inicio</span>
                                        <p class="font-medium text-slate-800">{{ $horario->hora_inicio }}</p>
                                    </div>
                                    <div class="relative px-5 py-4 bg-white rounded-lg border border-slate-200 shadow-sm group-hover/item:border-cyan-200 transition-colors duration-300 flex items-center justify-center">
                                        <span class="absolute -top-2.5 left-2 px-2 py-0.5 bg-cyan-50 text-[10px] font-medium text-cyan-700 rounded-full">Fin</span>
                                        <p class="font-medium text-slate-800">{{ $horario->hora_fin }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Doctor -->
                            <div class="group/item">
                                <label class="block text-sm font-medium text-slate-600 mb-2 ml-1 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 bg-cyan-50 text-cyan-600 rounded-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </span>
                                    Médico responsable
                                </label>
                                <div class="px-5 py-4 bg-white rounded-lg border border-slate-200 shadow-sm group-hover/item:border-cyan-200 transition-colors duration-300">
                                    <p class="font-medium text-slate-800">{{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }}</p>
                                </div>
                            </div>

                            <!-- Consultorio -->
                            <div class="group/item">
                                <label class="block text-sm font-medium text-slate-600 mb-2 ml-1 flex items-center">
                                <span class="flex items-center justify-center w-5 h-5 mr-2 bg-cyan-50 text-cyan-600 rounded-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </span>
                                    Ubicación
                                </label>
                                <div class="px-5 py-4 bg-white rounded-lg border border-slate-200 shadow-sm group-hover/item:border-cyan-200 transition-colors duration-300">
                                    <p class="font-medium text-slate-800">{{ $horario->consultorio->nombre }} - {{ $horario->consultorio->ubicacion }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de acción -->
                    <div class="flex justify-center pt-2">
                        <a href="{{ url('admin/horarios') }}" class="relative px-8 py-3.5 bg-gradient-to-r from-slate-600 to-slate-700 text-white rounded-xl shadow-md hover:shadow-lg hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 flex items-center space-x-3 group">
                            <svg class="w-5 h-5 text-white/90 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                            </svg>
                            <span class="font-medium">Volver al Listado</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Patrones de fondo */
        .bg-medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Fuentes */
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
    </style>
@endsection
