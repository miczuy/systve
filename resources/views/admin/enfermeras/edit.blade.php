@extends('layouts.admin')

@section('content')
    <!-- CSS de Flatpickr para el calendario -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="min-h-screen bg-gradient-to-br from-indigo-50 to-blue-100 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group relative">
            <!-- Decorative elements -->
            <div class="absolute -right-16 -top-16 w-40 h-40 bg-blue-100 rounded-full opacity-70 blur-2xl"></div>
            <div class="absolute -left-12 -bottom-12 w-32 h-32 bg-indigo-100 rounded-full opacity-70 blur-2xl"></div>

            <!-- Encabezado con efecto de fondo -->
            <div class="relative bg-gradient-to-r from-blue-600 to-indigo-800 px-10 pt-8 pb-16 overflow-hidden">
                <div class="absolute inset-0 bg-medical-pattern opacity-10"></div>
                <div class="absolute -bottom-12 -right-12 w-40 h-40 bg-blue-400/20 rounded-full blur-2xl"></div>

                <div class="relative flex flex-col items-center space-y-5 text-center">
                    <span class="inline-flex p-3 rounded-full border-2 border-blue-400/40 shadow-md bg-white/10 backdrop-blur-sm text-white animate-pulse-slow">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </span>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight font-heading drop-shadow-sm">Actualización de Enfermera</h1>
                        <p class="mt-2 text-blue-100 font-light max-w-xl mx-auto">Modifica los datos de la enfermera para mantener la información actualizada en el sistema</p>
                    </div>

                    <!-- Breadcrumb navigation -->
                    <nav class="inline-flex bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-xs font-medium text-blue-50 mt-2">
                        <ol class="flex items-center space-x-1">
                            <li>
                                <a href="{{ url('/admin') }}" class="hover:text-white transition-colors">Dashboard</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </li>
                            <li>
                                <a href="{{ url('/admin/enfermeras') }}" class="hover:text-white transition-colors">Enfermeras</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </li>
                            <li class="text-white">Editar</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <form action="{{ url('/admin/enfermeras', $enfermera->id) }}" method="POST" class="px-8 py-10 md:px-12 lg:px-16 space-y-8 relative">
                @csrf
                @method('PUT')

                <!-- Summary card with basic info -->
                <div class="bg-blue-50/80 rounded-2xl p-6 border border-blue-100 shadow-sm -mt-14 mb-8 relative z-10 backdrop-blur-sm">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 w-14 h-14 rounded-xl flex items-center justify-center shadow-md">
                                <span class="text-2xl font-bold text-white">{{ substr($enfermera->nombres, 0, 1) }}{{ substr($enfermera->apellidos, 0, 1) }}</span>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-slate-700">{{ $enfermera->nombres }} {{ $enfermera->apellidos }}</h3>
                                <p class="text-sm text-slate-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    ID: {{ $enfermera->id }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Registro: {{ $enfermera->created_at->format('d/m/Y') }}
                            </span>
                            <span class="px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-800 rounded-full flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Activo
                            </span>
                        </div>
                    </div>
                </div>

                @if (session('error'))
                    <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-5 rounded-xl flex items-center space-x-3 animate-fade-in">
                        <svg class="w-6 h-6 flex-shrink-0 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-medium text-rose-800">Error al actualizar</h3>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Secciones del formulario con visual separada -->
                <div class="space-y-8">
                    <!-- Sección de información personal -->
                    <div>
                        <h3 class="font-medium text-slate-700 border-b border-slate-200 pb-3 mb-5 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Información Personal
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nombres" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Nombres <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="nombres" id="nombres" value="{{ old('nombres', $enfermera->nombres) }}" placeholder="Ingrese los nombres"
                                           class="pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>
                                </div>
                                @error('nombres')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="apellidos" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Apellidos <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $enfermera->apellidos) }}" placeholder="Ingrese los apellidos"
                                           class="pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>
                                </div>
                                @error('apellidos')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="cedula" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Cédula <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="cedula" id="cedula" value="{{ old('cedula', $enfermera->cedula) }}" placeholder="Ingrese la cédula"
                                           class="pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>
                                </div>
                                @error('cedula')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="fecha_nacimiento_display" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Fecha de Nacimiento <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <!-- Campo visual para el datepicker -->
                                    <input type="text" id="fecha_nacimiento_display"
                                           placeholder="Seleccione fecha de nacimiento"
                                           class="datepicker pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>

                                    <!-- Campo real que enviará los datos -->
                                    <input type="hidden" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $enfermera->fecha_nacimiento->format('Y-m-d')) }}">
                                </div>
                                @error('fecha_nacimiento')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sección de información de contacto -->
                    <div>
                        <h3 class="font-medium text-slate-700 border-b border-slate-200 pb-3 mb-5 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Información de Contacto
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="celular" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Celular <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="celular" id="celular" value="{{ old('celular', $enfermera->celular) }}" placeholder="Ingrese el número de celular"
                                           class="pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>
                                </div>
                                @error('celular')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="direccion" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Dirección <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $enfermera->direccion) }}" placeholder="Ingrese la dirección"
                                           class="pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>
                                </div>
                                @error('direccion')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sección de acceso a cuenta -->
                    <div>
                        <h3 class="font-medium text-slate-700 border-b border-slate-200 pb-3 mb-5 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                            Información de Acceso
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-slate-600 ml-1 flex items-center">
                                    Correo Electrónico <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email', $enfermera->user->email) }}" placeholder="Ingrese el correo electrónico"
                                           class="pl-10 block w-full border-0 bg-slate-50 rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 shadow-sm" required>
                                </div>
                                @error('email')
                                <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 p-5 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="flex items-start mb-4">
                                <div class="flex-shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-slate-700">Actualización de contraseña</h3>
                                    <p class="text-xs text-slate-500 mt-1">Deje estos campos vacíos si no desea cambiar la contraseña.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                <div class="space-y-2">
                                    <label for="password" class="block text-sm font-medium text-slate-600 ml-1">
                                        Nueva Contraseña
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </div>
                                        <input type="password" name="password" id="password" placeholder="Escriba la nueva contraseña"
                                               class="pl-10 block w-full border-0 bg-white rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 transition-all duration-200 shadow-sm">
                                    </div>
                                    @error('password')
                                    <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="password_confirmation" class="block text-sm font-medium text-slate-600 ml-1">
                                        Confirmar Contraseña
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                        </div>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repita la nueva contraseña"
                                               class="pl-10 block w-full border-0 bg-white rounded-xl ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-500 transition-all duration-200 shadow-sm">
                                    </div>
                                    @error('password_confirmation')
                                    <p class="text-sm text-red-600 mt-1 ml-1 flex items-center space-x-1">
                                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4 border-t border-slate-200 pt-8 mt-10">
                    <a href="{{ url('admin/enfermeras') }}" class="w-full sm:w-auto px-6 py-3 border border-slate-300 bg-white text-slate-700 rounded-xl hover:bg-slate-50 transition-all duration-200 flex items-center justify-center space-x-2 group shadow-sm">
                        <svg class="w-5 h-5 text-slate-400 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Volver a la lista</span>
                    </a>

                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/90 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="font-medium">Guardar Cambios</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Formatear la fecha para mostrarla en el campo visual
            const dateValue = "{{ old('fecha_nacimiento', $enfermera->fecha_nacimiento->format('Y-m-d')) }}";

            // Inicializar Flatpickr con opciones avanzadas
            const datePicker = flatpickr("#fecha_nacimiento_display", {
                locale: "es",
                dateFormat: "d/m/Y",
                defaultDate: dateValue,
                altInput: true,
                altFormat: "d F, Y",
                disableMobile: false,
                monthSelectorType: "static",
                position: "auto",
                maxDate: new Date(), // No permitir fechas futuras
                animate: true,
                plugins: [],
                onChange: function(selectedDates, dateStr, instance) {
                    // Actualizar el campo oculto con el formato Y-m-d para enviarlo al servidor
                    if(selectedDates.length > 0) {
                        const formattedDate = selectedDates[0].getFullYear() + '-' +
                            ('0' + (selectedDates[0].getMonth() + 1)).slice(-2) + '-' +
                            ('0' + selectedDates[0].getDate()).slice(-2);
                        document.getElementById('fecha_nacimiento').value = formattedDate;
                    }
                }
            });

            // Para marcar el campo como inválido si hay error
            @if($errors->has('fecha_nacimiento'))
            document.getElementById('fecha_nacimiento_display').classList.add('border-red-500', 'ring-red-500', 'focus:ring-red-500');
            @endif
        });
    </script>

    <style>
        /* Estilos específicos para Flatpickr */
        .flatpickr-calendar {
            border-radius: 0.75rem !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
            border: 1px solid rgba(203, 213, 225, 0.5) !important;
            font-family: inherit !important;
        }

        .flatpickr-day.selected {
            background: #3b82f6 !important;
            border-color: #3b82f6 !important;
        }

        .flatpickr-day.today {
            border-color: #3b82f6 !important;
        }

        .flatpickr-day:hover {
            background: #dbeafe !important;
            border-color: #dbeafe !important;
        }

        .flatpickr-months .flatpickr-month {
            background: #3b82f6 !important;
            color: white !important;
            fill: white !important;
        }

        .flatpickr-months .flatpickr-prev-month,
        .flatpickr-months .flatpickr-next-month {
            color: rgba(255, 255, 255, 0.8) !important;
            fill: rgba(255, 255, 255, 0.8) !important;
        }

        .flatpickr-months .flatpickr-prev-month:hover,
        .flatpickr-months .flatpickr-next-month:hover {
            color: white !important;
            fill: white !important;
        }

        .flatpickr-current-month {
            color: white !important;
        }

        .flatpickr-weekdays {
            background: #4f46e5 !important;
        }

        span.flatpickr-weekday {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500 !important;
        }

        .numInputWrapper:hover {
            background: rgba(255, 255, 255, 0.1) !important;
        }

        .numInputWrapper span {
            border: none !important;
        }

        .flatpickr-current-month .numInputWrapper span.arrowUp:after {
            border-bottom-color: rgba(255, 255, 255, 0.9) !important;
        }

        .flatpickr-current-month .numInputWrapper span.arrowDown:after {
            border-top-color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Estilos generales */
        .bg-medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .font-heading {
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .animate-pulse-slow {
            animation: pulse 3s infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
    </style>
@endsection
