@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white py-8">
        <div class="max-w-4xl mx-auto px-4 w-full">
            <!-- Tarjeta principal -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-transform duration-300 hover:shadow-2xl">
                <!-- Header mejorado -->
                <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-8 px-8 text-center relative">
                    <div class="absolute top-3 right-4 bg-white/20 px-4 py-2 rounded-full text-sm font-medium">
                        Capacidad: {{$consultorio->capacidad}}
                    </div>

                    <!-- Título destacado -->
                    <div class="mb-4">
                        <h1 class="text-4xl font-bold mb-2 tracking-tight drop-shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 inline-block mr-3 -mt-2" viewBox="0 0 24 24" fill="currentColor" stroke="white">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 16H6c-.55 0-1-.45-1-1V6c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1z"/>
                                <path d="M11 7h2v2h-2zM11 11h2v6h-2z"/>
                            </svg>
                            {{$consultorio->nombre}}
                        </h1>
                        <p class="text-lg opacity-95 font-medium flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            {{$consultorio->ubicacion}}
                        </p>
                    </div>
                </div>

                <!-- Contenido -->
                <div class="p-8">
                    @if (session('error'))
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-red-800">Error</p>
                                <p class="text-red-700 text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Grid de información -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Sección de contacto -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 p-5 rounded-xl">
                                <h3 class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-4">Información de Contacto</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                        </svg>
                                        <span class="text-gray-700">{{$consultorio->telefono}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-5 rounded-xl">
                                <h3 class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-4">Especialidad Médica</h3>
                                <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full border border-blue-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-medium text-gray-700">{{$consultorio->especialidad}}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Sección adicional -->
                        <div class="bg-gray-50 p-5 rounded-xl">
                            <h3 class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-4">Detalles Adicionales</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm text-gray-500">Horario de Atención</dt>
                                    <dd class="font-medium text-gray-700 mt-1">Lunes a Viernes: 8:00 - 20:00</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-gray-500">Equipamiento Principal</dt>
                                    <dd class="font-medium text-gray-700 mt-1">Sala de espera, 5 consultorios</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Botón de acción -->
                    <div class="mt-8 border-t border-gray-100 pt-6 text-center">
                        <a href="{{ url('admin/consultorios') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                            </svg>
                            Volver al listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
