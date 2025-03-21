@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50 flex items-center justify-center p-4 md:p-6">
        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
            <!-- Encabezado con efecto vidrio mejorado -->
            <div class="relative bg-gradient-to-r from-violet-600 via-indigo-600 to-purple-600 px-8 pt-10 pb-14 overflow-hidden">
                <!-- Patrón de fondo mejorado -->
                <div class="absolute inset-0 opacity-10">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <pattern id="medical-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M20 0C9 0 0 9 0 20s9 20 20 20 20-9 20-20S31 0 20 0zm0 36c-8.8 0-16-7.2-16-16S11.2 4 20 4s16 7.2 16 16-7.2 16-16 16z" fill="currentColor" fillOpacity="0.2"/>
                                <circle cx="20" cy="20" r="4" fill="currentColor" fillOpacity="0.3"/>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#medical-pattern)"/>
                    </svg>
                </div>

                <!-- Flotantes decorativos -->
                <div class="absolute top-16 right-12 w-16 h-16 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute bottom-8 left-10 w-24 h-24 rounded-full bg-white/10 blur-3xl"></div>

                <!-- Contenido del encabezado -->
                <div class="relative flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <div class="p-3.5 bg-white/15 rounded-xl backdrop-blur-sm border border-white/20 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Registro de Doctor</h1>
                            <p class="mt-1 text-indigo-100 text-base font-light">Complete el formulario para registrar un nuevo profesional</p>
                        </div>
                    </div>

                    <!-- Indicadores de estado -->
                    <div class="hidden md:flex items-center space-x-1.5">
                        <span class="flex h-3 w-3 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-200 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-300"></span>
                        </span>
                        <span class="text-white/80 text-sm">Formulario de registro</span>
                    </div>
                </div>

                <!-- Degradado inferior -->
                <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-indigo-700/30 to-transparent"></div>
            </div>

            <form action="{{ url('/admin/doctores/create') }}" method="POST" class="p-6 md:p-8 space-y-7">
                @csrf

                @if (session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl flex items-start space-x-3 shadow-sm animate-fade-in">
                        <div class="p-1 bg-red-100 rounded-full mt-0.5">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-red-800 text-sm">Error en el formulario</p>
                            <p class="text-red-700 text-sm mt-0.5">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Sección 1: Información Personal -->
                <div class="bg-gradient-to-br from-white to-indigo-50/30 rounded-xl p-6 space-y-6 shadow-sm border border-indigo-100/50">
                    <div class="flex items-center space-x-3 border-b border-indigo-100 pb-3">
                        <div class="p-1.5 bg-indigo-100 rounded-lg">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-medium text-indigo-900">Información Personal</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nombres -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 transition-colors group-hover:text-indigo-600">
                                Nombres <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="nombres"
                                       value="{{ old('nombres') }}"
                                       placeholder="Nombres completos"
                                       required>
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
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 transition-colors group-hover:text-indigo-600">
                                Apellidos <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="apellidos"
                                       value="{{ old('apellidos') }}"
                                       placeholder="Apellidos completos"
                                       required>
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
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 transition-colors group-hover:text-indigo-600">
                                Cédula <span class="text-red-500">*</span>
                            </label>
                            <div class="flex gap-2">
                                <div class="relative group w-1/4">
                                    <select class="w-full pl-3 pr-8 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none group-hover:ring-indigo-300 text-sm"
                                            name="nacionalidad"
                                            required>
                                        <option value="V" {{ old('nacionalidad') == 'V' ? 'selected' : '' }}>V</option>
                                        <option value="E" {{ old('nacionalidad') == 'E' ? 'selected' : '' }}>E</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative w-3/4">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                        </svg>
                                    </div>
                                    <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                           type="text"
                                           name="cedula"
                                           value="{{ old('cedula') }}"
                                           placeholder="Número de cédula"
                                           required>
                                    @error('cedula')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            @error('nacionalidad')<p class="text-xs text-red-600 mt-1 ml-1 flex items-center">{{ $message }}</p>@enderror
                            @error('cedula')<p class="text-xs text-red-600 mt-1 ml-1 flex items-center">{{ $message }}</p>@enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 transition-colors group-hover:text-indigo-600">
                                Teléfono <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="telefono"
                                       value="{{ old('telefono') }}"
                                       placeholder="Número de contacto"
                                       required>
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
                        <div class="space-y-1.5 group md:col-span-2">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 transition-colors group-hover:text-indigo-600">
                                Licencia Médica <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="licencia_medica"
                                       value="{{ old('licencia_medica') }}"
                                       placeholder="Número de licencia profesional médica"
                                       required>
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
                <div class="bg-gradient-to-br from-white to-purple-50/30 rounded-xl p-6 space-y-6 shadow-sm border border-purple-100/50">
                    <div class="flex items-center space-x-3 border-b border-purple-100 pb-3">
                        <div class="p-1.5 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-medium text-purple-900">Especialidades Médicas</h2>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-purple-700 mb-1 ml-1">
                            Asignar Especialidades <span class="text-red-500">*</span>
                        </label>
                        <div id="specialties-container" class="space-y-3">
                            <div class="flex items-center gap-2">
                                <div class="relative group flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <select name="specialty_ids[]"
                                            class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-purple-100 focus:ring-purple-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none text-sm">
                                        @foreach($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">

                                    </div>
                                </div>
                                <button type="button" onclick="addSpecialtyField()"
                                        class="p-3 bg-gradient-to-br from-purple-600 to-indigo-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('specialty_ids')
                        <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                            <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mt-2 grid grid-cols-4 gap-2 pb-1">
                        @foreach($specialties->take(4) as $specialty)
                            <div class="text-xs bg-purple-50 border border-purple-100 py-1.5 px-2 rounded-lg text-purple-700 text-center">
                                {{ Str::limit($specialty->nombre, 15) }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Sección 3: Información de Cuenta -->
                <div class="bg-gradient-to-br from-white to-blue-50/30 rounded-xl p-6 space-y-6 shadow-sm border border-blue-100/50">
                    <div class="flex items-center space-x-3 border-b border-blue-100 pb-3">
                        <div class="p-1.5 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-medium text-blue-900">Acceso al Sistema</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Correo -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-blue-700 mb-1 ml-1 transition-colors group-hover:text-blue-600">
                                Correo Electrónico <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="correo@ejemplo.com"
                                       required>
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
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-blue-700 mb-1 ml-1 transition-colors group-hover:text-blue-600">
                                Contraseña <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm"
                                       type="password"
                                       name="password"
                                       placeholder="Mínimo 8 caracteres"
                                       required>
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
                        <div class="space-y-1.5 group md:col-span-2">
                            <label class="block text-sm font-medium text-blue-700 mb-1 ml-1 transition-colors group-hover:text-blue-600">
                                Confirmar Contraseña <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-blue-100 focus:ring-blue-400/50 focus:bg-white placeholder-blue-300/80 transition-all duration-200 shadow-sm group-hover:ring-blue-300 text-sm"
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="Confirmar contraseña"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nota Informativa -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-100/80 rounded-lg p-4 flex items-start space-x-3">
                    <div class="p-1 bg-indigo-100 rounded-lg mt-0.5">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-indigo-900 font-medium">Información importante</p>
                        <p class="text-xs text-indigo-700 mt-1">
                            Al registrar un nuevo doctor, se creará automáticamente una cuenta de usuario con el rol necesario para acceder al sistema.
                            Asegúrese de proporcionar un correo electrónico válido para el envío de las credenciales.
                        </p>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 sm:gap-4 pt-4 border-t border-gray-100">
                    <a href="{{ url('admin/doctores') }}" class="px-6 py-3 border border-indigo-200 text-indigo-700 rounded-xl hover:bg-indigo-50/50 transition-all duration-200 flex items-center justify-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:shadow-md hover:shadow-indigo-200 transition-all duration-200 flex items-center justify-center gap-2 group">
                        <svg class="w-5 h-5 text-white/90 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-medium">Registrar Doctor</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }
    </style>

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
                            class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-purple-100 focus:ring-purple-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none text-sm">
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
@endsection
