@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
            <!-- Encabezado con efecto vidrio -->
            <div class="relative bg-gradient-to-r from-indigo-700 to-purple-700 px-10 pt-8 pb-12">
                <div class="absolute inset-0 bg-noise opacity-10"></div>
                <div class="relative flex flex-col items-center space-y-4 text-center">
                    <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m-7-4h14M5 8h14"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight uppercase">Registro de Enfermera</h1>
                        <p class="mt-1 text-indigo-100/90 font-light">Agrega nuevos profesionales al equipo</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/enfermeras/create') }}" method="POST" class="px-10 py-8 space-y-8">
                @csrf

                @if (session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl flex items-center space-x-3 shadow-sm">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div>
                            <p class="font-medium text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Sección: Datos Personales -->
                <fieldset class="space-y-6">
                    <legend class="text-lg font-semibold text-gray-800/90 mb-4">Datos Personales</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombres -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Nombres <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="nombres"
                                       value="{{ old('nombres') }}"
                                       placeholder="Ingrese nombres"
                                       required>
                                @error('nombres')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('nombres')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Apellidos <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="apellidos"
                                       value="{{ old('apellidos') }}"
                                       placeholder="Ingrese apellidos"
                                       required>
                                @error('apellidos')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('apellidos')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cédula -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Cédula <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="cedula"
                                       value="{{ old('cedula') }}"
                                       placeholder="Ingrese cédula"
                                       required>
                                @error('cedula')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('cedula')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Fecha de Nacimiento <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="date"
                                       name="fecha_nacimiento"
                                       value="{{ old('fecha_nacimiento') }}"
                                       required>
                                @error('fecha_nacimiento')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('fecha_nacimiento')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Sección: Información de Contacto -->
                <fieldset class="space-y-6">
                    <legend class="text-lg font-semibold text-gray-800/90 mb-4">Información de Contacto</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Celular -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Celular <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="celular"
                                       value="{{ old('celular') }}"
                                       placeholder="Ingrese celular"
                                       required>
                                @error('celular')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('celular')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Correo -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Correo <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Ingrese correo"
                                       required>
                                @error('email')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('email')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Sección: Información de Acceso -->
                <fieldset class="space-y-6">
                    <legend class="text-lg font-semibold text-gray-800/90 mb-4">Información de Acceso</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Contraseña -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Contraseña <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="password"
                                       name="password"
                                       placeholder="Ingrese contraseña"
                                       required>
                                @error('password')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('password')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Confirmar Contraseña <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="Confirme contraseña"
                                       required>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Sección: Dirección -->
                <fieldset class="space-y-6">
                    <legend class="text-lg font-semibold text-gray-800/90 mb-4">Dirección</legend>
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Dirección <span class="text-red-500">*</span></label>
                        <div class="relative group">
                            <textarea class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                      name="direccion"
                                      rows="4"
                                      placeholder="Ingrese dirección completa"
                                      required>{{ old('direccion') }}</textarea>
                            @error('direccion')
                            <div class="absolute right-4 top-4 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            @enderror
                        </div>
                        @error('direccion')
                        <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </fieldset>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 mt-10">
                    <a href="{{ url('admin/enfermeras') }}" class="px-6 py-3.5 border border-gray-300/80 text-gray-700/90 rounded-xl hover:bg-gray-50/50 transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-indigo-600 to-purple-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Registrar Enfermera</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
