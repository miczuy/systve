@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-cyan-50 to-blue-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group">
            <!-- Encabezado con efecto vidrio médico mejorado -->
            <div class="relative bg-gradient-to-r from-cyan-600 via-blue-600 to-blue-700 px-10 pt-10 pb-14 overflow-hidden">
                <!-- Patrones de fondo mejorados -->
                <div class="absolute inset-0 opacity-10">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <pattern id="medical-dots" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="1" fill="currentColor" />
                                <circle cx="8" cy="8" r="1.5" fill="currentColor" />
                                <circle cx="14" cy="14" r="1" fill="currentColor" />
                            </pattern>
                            <pattern id="medical-cross" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M20 10v20M10 20h20" stroke="currentColor" stroke-width="2" />
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#medical-dots)" />
                        <rect width="100%" height="100%" fill="url(#medical-cross)" opacity="0.3" />
                    </svg>
                </div>

                <!-- Elementos decorativos flotantes -->
                <div class="absolute top-16 right-12 w-32 h-32 rounded-full bg-gradient-to-br from-blue-400/20 to-cyan-300/10 blur-3xl"></div>
                <div class="absolute bottom-8 left-10 w-40 h-40 rounded-full bg-gradient-to-tr from-blue-400/20 to-cyan-300/10 blur-3xl"></div>

                <!-- Contenido del encabezado -->
                <div class="relative flex flex-col md:flex-row items-center md:justify-between gap-8">
                    <div class="flex items-center gap-6">
                        <div class="p-5 bg-white/15 rounded-full backdrop-blur-sm border border-white/30 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-3">
                                <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Modificar Doctor</h1>
                                <span class="px-3 py-1 bg-blue-500/20 backdrop-blur-sm rounded-full text-xs font-medium text-white border border-blue-400/20 whitespace-nowrap">
                                    Dr. {{ $doctor->apellidos }}
                                </span>
                            </div>
                            <p class="mt-1 text-blue-100/90 font-light">Actualiza la información del doctor con los datos más recientes</p>
                        </div>
                    </div>

                    <!-- Insignia de estado -->
                    <div class="hidden md:flex items-center gap-2 bg-blue-500/20 backdrop-blur-sm px-4 py-2 rounded-full border border-blue-400/20">
                        <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        <span class="text-white/95 text-sm font-medium">Modo edición</span>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <form action="{{ url('/admin/doctores', $doctor->id) }}" method="POST" class="px-8 py-8 md:px-12 space-y-8">
                @csrf
                @method('PUT')

                <!-- Mensaje de error -->
                @if (session('error'))
                    <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-xl flex items-center space-x-3 animate-fade-in">
                        <div class="p-1 bg-rose-100 rounded-full">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium">Error en el formulario</p>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Sección 1: Información Personal -->
                <div class="bg-gradient-to-br from-white to-blue-50/30 rounded-2xl p-7 shadow-sm border border-blue-100/40">
                    <div class="flex items-center space-x-3 border-b border-blue-100/60 pb-4 mb-6">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-blue-900">Información Personal</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nombres -->
                        <div class="space-y-2 group">
                            <label for="nombres" class="block text-sm font-medium text-blue-800/80 ml-1 group-hover:text-blue-800 transition-colors">
                                Nombres <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       id="nombres"
                                       name="nombres"
                                       value="{{ $doctor->nombres }}"
                                       placeholder="Ej: Juan Carlos"
                                       required
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm">
                                @error('nombres')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('nombres')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-2 group">
                            <label for="apellidos" class="block text-sm font-medium text-blue-800/80 ml-1 group-hover:text-blue-800 transition-colors">
                                Apellidos <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       id="apellidos"
                                       name="apellidos"
                                       value="{{ $doctor->apellidos }}"
                                       placeholder="Ej: Perez Mendez"
                                       required
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm">
                                @error('apellidos')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('apellidos')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Cédula -->
                        <div class="space-y-2 group">
                            <label for="nacionalidad" class="block text-sm font-medium text-blue-800/80 ml-1 group-hover:text-blue-800 transition-colors">
                                Cédula <span class="text-red-500">*</span>
                            </label>
                            <div class="flex gap-2">
                                <div class="relative group w-1/4">
                                    <select id="nacionalidad"
                                            name="nacionalidad"
                                            required
                                            class="w-full pl-3 pr-8 py-3.5 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none group-hover:ring-blue-300 text-sm">
                                        <option value="V" {{ explode('-', $doctor->cedula)[0] == 'V' ? 'selected' : '' }}>V</option>
                                        <option value="E" {{ explode('-', $doctor->cedula)[0] == 'E' ? 'selected' : '' }}>E</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative w-3/4">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                        </svg>
                                    </div>
                                    <input type="text"
                                           id="cedula"
                                           name="cedula"
                                           value="{{ explode('-', $doctor->cedula)[1] }}"
                                           placeholder="Número de cédula"
                                           required
                                           class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm">
                                    @error('cedula')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            @error('cedula')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-2 group">
                            <label for="telefono" class="block text-sm font-medium text-blue-800/80 ml-1 group-hover:text-blue-800 transition-colors">
                                Teléfono <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       id="telefono"
                                       name="telefono"
                                       value="{{ $doctor->telefono }}"
                                       placeholder="Ej: +58-412-1234567"
                                       required
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm">
                                @error('telefono')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('telefono')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Licencia Médica -->
                        <div class="space-y-2 group">
                            <label for="licencia_medica" class="block text-sm font-medium text-blue-800/80 ml-1 group-hover:text-blue-800 transition-colors">
                                Licencia Médica <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       id="licencia_medica"
                                       name="licencia_medica"
                                       value="{{ $doctor->licencia_medica }}"
                                       placeholder="Número de licencia médica"
                                       required
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm">
                                @error('licencia_medica')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('licencia_medica')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección 2: Especialidades -->
                <div class="bg-gradient-to-br from-white to-purple-50/30 rounded-2xl p-7 shadow-sm border border-purple-100/40">
                    <div class="flex items-center space-x-3 border-b border-purple-100/60 pb-4 mb-6">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-purple-900">Especialidades Médicas</h2>
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-purple-800/80 ml-1">
                                Asignar Especialidades <span class="text-red-500">*</span>
                            </label>
                            <div id="specialties-container" class="space-y-3">
                                @foreach($doctor->specialties as $specialty)
                                    <div class="flex items-center gap-2 animate-fade-in">
                                        <div class="relative group flex-1">
                                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                                </svg>
                                            </div>
                                            <select name="specialty_ids[]"
                                                    class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-purple-100 focus:ring-purple-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none text-sm">
                                                @foreach($specialties as $option)
                                                    <option value="{{ $option->id }}" {{ $option->id == $specialty->id ? 'selected' : '' }}>{{ $option->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <button type="button" onclick="removeSpecialtyField(this)"
                                                class="p-3 bg-red-500 text-white/95 rounded-xl hover:bg-red-600 transition-all duration-200 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>

                            @if($doctor->specialties->isEmpty())
                                <div class="flex items-center justify-center py-5 bg-white rounded-xl ring-2 ring-purple-100 text-purple-400 text-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    No hay especialidades asignadas
                                </div>
                            @endif

                            <div class="flex justify-start mt-4">
                                <button type="button" onclick="addSpecialtyField()"
                                        class="flex items-center justify-center px-4 py-2.5 bg-gradient-to-br from-purple-600 to-indigo-600 text-white rounded-xl hover:shadow-lg shadow-sm transition-all duration-200 gap-2">
                                    <svg class="w-4 h-4 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="font-medium">Agregar Especialidad</span>
                                </button>
                            </div>
                        </div>

                        <!-- Información sobre especialidades -->
                        <div class="bg-purple-50/80 rounded-xl px-5 py-4 flex items-start gap-3 border border-purple-100/70">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="text-sm text-purple-700">
                                <p class="font-medium text-purple-800">Información sobre especialidades</p>
                                <p class="mt-1">Las especialidades médicas indican las áreas específicas de competencia del doctor. Puede agregar tantas especialidades como sea necesario.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección 3: Credenciales de Acceso -->
                <div class="bg-gradient-to-br from-white to-cyan-50/30 rounded-2xl p-7 shadow-sm border border-cyan-100/40">
                    <div class="flex items-center space-x-3 border-b border-cyan-100/60 pb-4 mb-6">
                        <div class="p-2 bg-cyan-100 rounded-lg">
                            <svg class="w-5 h-5 text-cyan-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-cyan-900">Credenciales de Acceso</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Correo Electrónico -->
                        <div class="space-y-2 group">
                            <label for="email" class="block text-sm font-medium text-cyan-800/80 ml-1 group-hover:text-cyan-800 transition-colors">
                                Correo Electrónico <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ $doctor->user->email }}"
                                       placeholder="correo@ejemplo.com"
                                       required
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-cyan-100 focus:ring-cyan-400/50 focus:bg-white placeholder-cyan-300/80 transition-all duration-200 shadow-sm group-hover:ring-cyan-300 text-sm">
                                @error('email')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('email')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="space-y-2 group">
                            <label for="password" class="block text-sm font-medium text-cyan-800/80 ml-1 group-hover:text-cyan-800 transition-colors">
                                Contraseña <small class="text-cyan-500">(Dejar vacío para mantener la actual)</small>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input type="password"
                                       id="password"
                                       name="password"
                                       placeholder="Nueva contraseña"
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-cyan-100 focus:ring-cyan-400/50 focus:bg-white placeholder-cyan-300/80 transition-all duration-200 shadow-sm group-hover:ring-cyan-300 text-sm">
                                @error('password')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('password')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="space-y-2 group md:col-span-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-cyan-800/80 ml-1 group-hover:text-cyan-800 transition-colors">
                                Confirmar Contraseña
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <input type="password"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="Confirmar contraseña"
                                       class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-cyan-100 focus:ring-cyan-400/50 focus:bg-white placeholder-cyan-300/80 transition-all duration-200 shadow-sm group-hover:ring-cyan-300 text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Información sobre contraseñas -->
                    <div class="mt-4 bg-cyan-50/80 rounded-xl px-5 py-4 flex items-start gap-3 border border-cyan-100/70">
                        <svg class="w-5 h-5 text-cyan-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="text-sm text-cyan-700">
                            <p class="font-medium text-cyan-800">Seguridad de contraseña</p>
                            <p class="mt-1">Si no desea cambiar la contraseña, deje estos campos en blanco. De lo contrario, la nueva contraseña debe tener al menos 8 caracteres.</p>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 sm:gap-4 pt-4 border-t border-slate-100">
                    <a href="{{ url('admin/doctores') }}" class="px-6 py-3.5 border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-50/50 transition-all duration-200 flex items-center justify-center gap-2 group shadow-sm">
                        <svg class="w-5 h-5 text-slate-500 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-600 text-white/95 rounded-xl hover:shadow-lg hover:shadow-blue-200 transition-all duration-200 flex items-center justify-center gap-2 group">
                        <svg class="w-5 h-5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-medium">Actualizar Doctor</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addSpecialtyField() {
            const container = document.getElementById('specialties-container');
            const newField = document.createElement('div');
            newField.classList.add('flex', 'items-center', 'gap-2', 'animate-fade-in');

            newField.innerHTML = `
                <div class="relative group flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <select name="specialty_ids[]"
                            class="w-full pl-10 pr-10 py-3.5 border-0 bg-white rounded-xl ring-2 ring-purple-100 focus:ring-purple-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none text-sm">
                        @foreach($specialties as $specialty)
            <option value="{{ $specialty->id }}">{{ $specialty->nombre }}</option>
                        @endforeach
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </div>
        <button type="button" onclick="removeSpecialtyField(this)"
                class="p-3 bg-red-500 text-white/95 rounded-xl hover:bg-red-600 transition-all duration-200 flex items-center justify-center">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
            </svg>
        </button>
`;

            container.appendChild(newField);
        }

        function removeSpecialtyField(button) {
            const fieldContainer = button.closest('div.flex');
            fieldContainer.classList.add('opacity-0', 'transform', 'scale-95');
            fieldContainer.style.transition = 'opacity 0.2s ease-out, transform 0.2s ease-out';

            setTimeout(() => {
                fieldContainer.remove();
            }, 200);
        }
    </script>

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
