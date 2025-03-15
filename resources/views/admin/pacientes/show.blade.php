@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group">
            <!-- Encabezado con efecto vidrio médico -->
            <div class="relative bg-gradient-to-r from-cyan-600 to-blue-700 px-10 pt-8 pb-12 overflow-hidden">
                <div class="absolute inset-0 bg-medical-pattern opacity-10"></div>
                <div class="relative flex flex-col items-center space-y-4 text-center">
                    <div class="p-4 bg-white/10 rounded-full backdrop-blur-sm border-2 border-white/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">{{$paciente->nombres}} {{$paciente->apellidos}}</h1>
                        <p class="mt-2 text-blue-100/90 font-light">Datos médicos completos del paciente</p>
                    </div>
                </div>
            </div>

            <div class="px-10 py-8 space-y-6">
                @if(session('error'))
                    <div class="bg-rose-100/90 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-center space-x-3 animate-fade-in">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Sección de Datos Básicos -->
                <div class="bg-slate-50/70 rounded-xl p-6 shadow-inner">
                    <h3 class="text-xl font-semibold text-cyan-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Información Personal
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Campos de datos básicos -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Nombres</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->nombres}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Apellidos</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->apellidos}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Cédula</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->cedula}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Fecha de Nacimiento</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->fecha_nacimiento}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Edad</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->edad}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Sexo</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->sexo}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Estado Civil</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->estado_civil}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Contacto -->
                <div class="bg-slate-50/70 rounded-xl p-6 shadow-inner">
                    <h3 class="text-xl font-semibold text-cyan-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Datos de Contacto
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Correo Electrónico</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->correo}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Teléfono</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->telefono}}</p>
                            </div>
                        </div>
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Dirección</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->direccion}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de Información Adicional -->
                <div class="bg-slate-50/70 rounded-xl p-6 shadow-inner">
                    <h3 class="text-xl font-semibold text-cyan-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Información Laboral
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Ocupación</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->ocupacion}}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Ocupación Actual</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{$paciente->ocupacion_actual}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón de acción -->
                <div class="flex justify-center mt-8">
                    <a href="{{ url('admin/pacientes') }}" class="px-8 py-3.5 bg-gradient-to-br from-slate-500 to-slate-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                        </svg>
                        <span class="font-medium">Volver al Listado</span>
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
