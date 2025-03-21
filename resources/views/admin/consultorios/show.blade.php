@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-sky-50 to-white py-8 px-4">
        <div class="max-w-4xl mx-auto w-full">
            <!-- Tarjeta principal con efectos mejorados -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1">
                <!-- Header premium con gradiente y patrón -->
                <div class="relative bg-gradient-to-r from-blue-800 via-blue-700 to-blue-600 text-white py-10 px-8 text-center overflow-hidden">
                    <!-- Patrón de fondo sutil -->
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <pattern id="medical-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <path d="M0 10h20v1H0zM10 0v20h1V0z" fill="currentColor"/>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" fill="url(#medical-pattern)"/>
                        </svg>
                    </div>

                    <!-- Indicador de capacidad -->
                    <div class="absolute top-3 right-4 bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-medium shadow-inner flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                        <span>Capacidad: {{$consultorio->capacidad}}</span>
                    </div>

                    <!-- Estado online/activo -->
                    <div class="absolute top-3 left-4 bg-green-500/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-medium border border-green-400/30 flex items-center space-x-1.5">
                        <span class="h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                        <span>{{ $consultorio->is_active ? 'Activo' : 'Inactivo' }}</span>
                    </div>

                    <!-- Título destacado con logo y datos principales -->
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center p-3 bg-white/10 backdrop-blur-sm rounded-full mb-4 border border-white/20 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 16H6c-.55 0-1-.45-1-1V6c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1z"/>
                                <path d="M11 7h2v2h-2zM11 11h2v6h-2z"/>
                            </svg>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-3 tracking-tight">
                            {{$consultorio->nombre}}
                        </h1>
                        <div class="flex items-center justify-center gap-2 text-lg opacity-95 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            {{$consultorio->ubicacion}}
                        </div>
                    </div>

                    <!-- Decoración inferior -->
                    <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-blue-800/30 to-transparent"></div>
                </div>

                <!-- Contenido principal con diseño mejorado -->
                <div class="p-6 md:p-8">
                    @if (session('error'))
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg flex items-start gap-3 animate-fade-in">
                            <div class="bg-red-100 p-1.5 rounded-full text-red-600 flex-shrink-0 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-red-800">Error</p>
                                <p class="text-red-700 text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif


                    <!-- Sección de Horarios Asignados -->
                    <div class="mb-6 bg-white rounded-xl border border-blue-200 shadow-sm overflow-hidden">
                        <div class="bg-blue-50 px-5 py-3 border-b border-blue-200">
                            <h2 class="font-semibold text-blue-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                Horarios Asignados
                            </h2>
                        </div>

                        <div class="divide-y divide-gray-100">
                            @if($horarios->count() > 0)
                                @foreach($horarios as $horario)
                                    <div class="p-4 hover:bg-gray-50 transition-colors flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-100 p-2 rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-800">
                                                    {{ $horario->dia }}
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            @if($horario->doctor)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Dr. {{ $horario->doctor->apellidos }}, {{ $horario->doctor->nombres }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Sin doctor asignado
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="p-8 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mx-auto mb-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-gray-500 mb-1">No hay horarios asignados actualmente.</p>
                                    <p class="text-sm text-gray-400">Los horarios asignados a este consultorio aparecerán aquí.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Vista semanal de horarios -->
                        <div class="border-t border-gray-200 bg-gray-50 p-4">
                            <h3 class="text-sm font-semibold text-gray-600 mb-3">Vista semanal</h3>
                            <div class="grid grid-cols-7 gap-1 text-center">
                                @php
                                    $dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                                    $diasCortos = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
                                @endphp

                                @foreach($diasCortos as $index => $dia)
                                    @php
                                        $diaActual = $dias[$index];
                                        $tieneHorario = $horarios->contains('dia', $diaActual);
                                    @endphp
                                    <div class="p-2 {{ $tieneHorario ? 'bg-blue-100 text-blue-800' : 'bg-white text-gray-500' }} rounded border {{ $tieneHorario ? 'border-blue-200' : 'border-gray-200' }}">
                                        <p class="text-xs font-semibold">{{ $dia }}</p>
                                        @if($tieneHorario)
                                            <div class="mt-1 h-1 w-full bg-blue-400 rounded-full"></div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Próximas citas -->
                    @if(isset($eventosPorFecha) && count($eventosPorFecha) > 0)
                        <div class="mb-6 bg-white rounded-xl border border-green-200 shadow-sm overflow-hidden">
                            <div class="bg-green-50 px-5 py-3 border-b border-green-200">
                                <h2 class="font-semibold text-green-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    Próximas Citas
                                </h2>
                            </div>

                            <div class="divide-y divide-gray-100 max-h-60 overflow-y-auto">
                                @foreach($eventosPorFecha as $fecha => $eventosDelDia)
                                    <div class="p-3 bg-gray-50">
                                        <h4 class="text-xs font-semibold text-gray-500 uppercase">
                                            {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($fecha)->locale('es')->dayName }}
                                        </h4>
                                    </div>

                                    @foreach($eventosDelDia as $evento)
                                        <div class="p-4 hover:bg-gray-50 transition-colors flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div class="bg-green-100 p-2 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-800">
                                                        {{ $evento->start->format('H:i') }} - Dr. {{ $evento->doctor->apellidos }}
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        Paciente: {{ $evento->user->name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $evento->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ ucfirst($evento->estado) }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Grid de información con tarjetas mejoradas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Sección de contacto -->
                        <div class="space-y-5">
                            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm transition-all duration-200 hover:shadow-md group">
                                <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wide mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500 group-hover:text-blue-600 transition-colors" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                    Información de Contacto
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-lg">
                                        <div class="bg-blue-100 p-2 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-xs text-gray-500 block">Teléfono</span>
                                            <span class="text-gray-800 font-medium">{{$consultorio->telefono ?: 'No disponible'}}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-lg">
                                        <div class="bg-blue-100 p-2 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-xs text-gray-500 block">Email</span>
                                            <span class="text-gray-800 font-medium">contacto@hospital.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm transition-all duration-200 hover:shadow-md group">
                                <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wide mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500 group-hover:text-blue-600 transition-colors" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Especialidad Médica
                                </h3>
                                <div class="flex items-center gap-2 bg-blue-50 px-5 py-3 rounded-lg border border-blue-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-medium text-gray-800">{{$consultorio->especialidad}}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Sección adicional -->
                        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm transition-all duration-200 hover:shadow-md group">
                            <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wide mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500 group-hover:text-blue-600 transition-colors" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Detalles Adicionales
                            </h3>
                            <dl class="space-y-4">
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <dt class="text-xs font-medium text-gray-500 uppercase">Horario de Atención</dt>
                                    <dd class="font-medium text-gray-800 mt-1.5 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        Lunes a Viernes: 8:00 - 20:00
                                    </dd>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <dt class="text-xs font-medium text-gray-500 uppercase">Resumen de Disponibilidad</dt>
                                    <dd class="font-medium text-gray-800 mt-1.5 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $disponibilidad['total_horas_semanales'] }} horas semanales
                                    </dd>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg">
                                    <dt class="text-xs font-medium text-gray-500 uppercase">Última actualización</dt>
                                    <dd class="font-medium text-gray-800 mt-1.5 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $consultorio->updated_at->format('d/m/Y H:i') }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="mt-8 border-t border-gray-100 pt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ url('admin/consultorios') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition-all duration-200 w-full sm:w-auto justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                            </svg>
                            Volver al listado
                        </a>

                        <a href="{{ url('admin/consultorios/' . $consultorio->id . '/edit') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 w-full sm:w-auto justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                            Editar Consultorio
                        </a>

                        <a href="{{ url('admin/horarios/create?consultorio_id=' . $consultorio->id) }}" class="inline-flex items-center px-6 py-3 border border-green-500 text-base font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 transition-all duration-200 w-full sm:w-auto justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                            Asignar Horario
                        </a>
                    </div>
                </div>

                <!-- Footer informativo -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-center text-gray-500 text-xs">
                    <p>Huellitas del Corazon © {{ date('Y') }}</p>
                    <p class="mt-1">Consultorio creado el {{ $consultorio->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
