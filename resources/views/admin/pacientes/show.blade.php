@extends('layouts.admin')

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl">
            <!-- Tarjeta principal -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                <!-- Encabezado con efecto degradado -->
                <div class="relative bg-gradient-to-r from-blue-600 to-cyan-600 px-8 py-16">
                    <div class="absolute inset-0 bg-medical-pattern opacity-15"></div>

                    <!-- Contenido del encabezado -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center ring-2 ring-white/20 mb-3">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair mb-1">{{$paciente->nombres}} {{$paciente->apellidos}}</h1>
                        <div class="flex items-center justify-center space-x-2 text-blue-100/90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                            </svg>
                            <span>{{$paciente->cedula}}</span>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="p-8">
                    @if(session('error'))
                        <div class="mb-6 bg-rose-100/90 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-center space-x-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    @endif

                    <!-- Sección de Datos Básicos -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-blue-800 mb-5 flex items-center border-b border-gray-200 pb-2">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Información Personal
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Nombres</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->nombres}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Apellidos</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->apellidos}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Cédula</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->cedula}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Fecha de Nacimiento</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->fecha_nacimiento ? \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') : 'No registrada'}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Edad</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->edad ?? 'No registrada'}} años
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Sexo</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->sexo ?? 'No registrado'}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Estado Civil</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->estado_civil ?? 'No registrado'}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Contacto -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-blue-800 mb-5 flex items-center border-b border-gray-200 pb-2">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Datos de Contacto
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Correo Electrónico</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->correo ?? 'No registrado'}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Teléfono</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->telefono ?? 'No registrado'}}
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <div class="text-sm font-medium text-gray-500 mb-1">Dirección</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->direccion ?? 'No registrada'}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Información Adicional -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-blue-800 mb-5 flex items-center border-b border-gray-200 pb-2">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            Información Laboral
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Ocupación</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->ocupacion ?? 'No registrada'}}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Ocupación Actual</div>
                                <div class="text-gray-900 font-medium p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    {{$paciente->ocupacion_actual ?? 'No registrada'}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de acción -->
                    <div class="flex justify-center mt-10">
                        <a href="{{ url('admin/pacientes') }}" class="px-6 py-3 bg-gradient-to-r from-slate-600 to-slate-700 text-white rounded-full hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                            <svg class="w-5 h-5 text-white/80 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        .bg-medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
    </style>
@endsection
