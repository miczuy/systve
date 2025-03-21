@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-100 flex items-center justify-center p-4 font-sans">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl group">
            <!-- Encabezado con diseño médico mejorado -->
            <div class="relative bg-gradient-to-r from-cyan-600 via-blue-600 to-blue-700 px-10 pt-10 pb-14 overflow-hidden">
                <div class="absolute inset-0 bg-medical-pattern opacity-15 mix-blend-overlay"></div>
                <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-blue-700/40 to-transparent"></div>

                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex items-center space-x-5">
                        <div class="p-4 bg-white/15 rounded-xl backdrop-blur-sm border border-white/20 shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight font-playfair">Detalles de Enfermería</h1>
                            <p class="mt-2 text-blue-50 font-light text-lg">Información profesional del personal</p>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-lg border border-white/10 text-white/90 text-sm font-medium">
                            ID: #{{ $enfermera->id }}
                        </div>
                    </div>
                </div>

                <!-- Indicadores visuales -->
                <div class="absolute top-3 right-3 flex space-x-1.5">
                    <div class="w-2.5 h-2.5 rounded-full bg-green-400 animate-pulse"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-blue-200"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-blue-200"></div>
                </div>
            </div>

            <div class="px-8 py-8 md:px-12 md:py-10 space-y-8">
                @if(session('error'))
                    <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-5 rounded-lg flex items-center space-x-3.5 animate-fade-in">
                        <svg class="w-6 h-6 flex-shrink-0 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium text-base">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Tarjeta de información principal -->
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-xl p-7 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-semibold text-cyan-800 mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2.5 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Datos Profesionales
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nombre -->
                        <div class="space-y-2 group">
                            <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Nombres
                            </label>
                            <div class="px-4 py-3.5 bg-white rounded-lg ring-1 ring-slate-200 shadow-sm group-hover:ring-cyan-200 group-hover:shadow-md transition-all duration-200">
                                <p class="font-medium text-slate-800">{{ $enfermera->nombres }}</p>
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-2 group">
                            <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Apellidos
                            </label>
                            <div class="px-4 py-3.5 bg-white rounded-lg ring-1 ring-slate-200 shadow-sm group-hover:ring-cyan-200 group-hover:shadow-md transition-all duration-200">
                                <p class="font-medium text-slate-800">{{ $enfermera->apellidos }}</p>
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="space-y-2 group md:col-span-2">
                            <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Correo Electrónico
                            </label>
                            <div class="px-4 py-3.5 bg-white rounded-lg ring-1 ring-slate-200 shadow-sm group-hover:ring-cyan-200 group-hover:shadow-md transition-all duration-200">
                                <p class="font-medium text-slate-800">{{ $enfermera->user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información adicional (opcional) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-100 shadow-sm">
                        <h4 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Estado Profesional
                        </h4>
                        <p class="text-blue-700 font-medium">Activo</p>
                    </div>

                    <div class="bg-cyan-50 rounded-xl p-6 border border-cyan-100 shadow-sm">
                        <h4 class="text-lg font-semibold text-cyan-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Último acceso
                        </h4>
                        <p class="text-cyan-700 font-medium">{{ \Carbon\Carbon::now()->subHours(rand(1, 24))->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">
                    <a href="{{ url('admin/enfermeras') }}" class="px-8 py-3.5 bg-gradient-to-br from-slate-600 to-slate-700 text-white rounded-xl hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/90 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                        </svg>
                        <span class="font-medium">Volver al Listado</span>
                    </a>

                    <a href="#" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-700 text-white rounded-xl hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        <span class="font-medium">Editar Perfil</span>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 text-center text-slate-500 text-sm">
                Huellitas del Corazon © {{ date('Y') }}
            </div>
        </div>
    </div>

    <style>
        .bg-medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Efecto de hover en las tarjetas */
        .group:hover .ring-slate-200 {
            @apply ring-cyan-200;
        }
    </style>
@endsection
