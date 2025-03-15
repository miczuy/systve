@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 flex items-center justify-center p-4">
        <div class="w-full max-w-3xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group">
            <!-- Encabezado con efecto vidrio médico -->
            <div class="relative bg-gradient-to-r from-cyan-600 to-blue-700 px-10 pt-8 pb-12 overflow-hidden">
                <div class="absolute inset-0 bg-medical-pattern opacity-10"></div>
                <div class="relative flex flex-col items-center space-y-4 text-center">
                    <div class="p-4 bg-white/10 rounded-full backdrop-blur-sm border-2 border-white/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5M14 5a2 2 0 10-4 0 2 2 0 004 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Ficha Médica</h1>
                        <p class="mt-2 text-blue-100/90 font-light">Datos profesionales del médico</p>
                    </div>
                </div>
            </div>

            <div class="px-10 py-8 space-y-6">
                <!-- Sección de Información Principal -->
                <div class="bg-slate-50/70 rounded-xl p-6 shadow-inner">
                    <h3 class="text-xl font-semibold text-cyan-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Datos Personales
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombres -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Nombres</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->nombres }}</p>
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Apellidos</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->apellidos }}</p>
                            </div>
                        </div>

                        <!-- Cédula -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Cédula</label>
                            <div class="flex gap-2">
                                <div class="w-20 px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                    <p class="font-medium text-slate-800">{{ explode('-', $doctor->cedula)[0] }}</p>
                                </div>
                                <div class="flex-1 px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                    <p class="font-medium text-slate-800">{{ explode('-', $doctor->cedula)[1] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Teléfono</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->telefono }}</p>
                            </div>
                        </div>

                        <!-- Licencia Médica -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Licencia Médica</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->licencia_medica }}</p>
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Correo</label>
                            <div class="px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                <p class="font-medium text-slate-800">{{ $doctor->user->email }}</p>
                            </div>
                        </div>

                        <!-- Especialidades -->
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1">Especialidades</label>
                            <div class="flex flex-wrap gap-2 px-4 py-3 bg-white rounded-lg ring-1 ring-slate-200/60 shadow-sm">
                                @forelse($doctor->specialties as $specialty)
                                    <span class="px-3 py-1 bg-gradient-to-br from-cyan-100 to-blue-100 text-cyan-800 text-sm font-medium rounded-full border border-cyan-200">
                                    {{ $specialty->nombre }}
                                </span>
                                @empty
                                    <p class="text-slate-500/90 italic">Sin especialidades registradas</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón de acción -->
                <div class="flex justify-center mt-8">
                    <a href="{{ url('admin/doctores') }}" class="px-8 py-3.5 bg-gradient-to-br from-slate-500 to-slate-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
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
