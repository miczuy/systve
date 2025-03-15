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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">Ficha de Paciente</h1>
                        <p class="mt-1 text-indigo-100/90 font-light">Registro de información personal y médica</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/pacientes/create') }}" method="POST" class="px-10 py-8 space-y-8">
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
                        <div class="flex gap-2">
                            <div class="relative group flex-1">
                                <select class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                        name="nacionalidad"
                                        required>
                                    <option value="V" {{ old('nacionalidad') == 'V' ? 'selected' : '' }}>V</option>
                                    <option value="E" {{ old('nacionalidad') == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                            </div>
                            <div class="relative group flex-[3]">
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
                        </div>
                        @error('nacionalidad')<p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>@enderror
                        @error('cedula')<p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>@enderror
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Fecha de Nacimiento</label>
                        <div class="relative group">
                            <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                   type="date"
                                   name="fecha_nacimiento"
                                   value="{{ old('fecha_nacimiento') }}">
                        </div>
                    </div>

                    <!-- Edad -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Edad</label>
                        <div class="relative group">
                            <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                   type="number"
                                   name="edad"
                                   value="{{ old('edad') }}"
                                   placeholder="Ingrese edad">
                        </div>
                    </div>

                    <!-- Sexo -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Sexo</label>
                        <div class="relative group">
                            <select class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                    name="sexo">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>
                    </div>

                    <!-- Estado Civil -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Estado Civil</label>
                        <div class="relative group">
                            <select class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                    name="estado_civil">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Soltero(a)" {{ old('estado_civil') == 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                                <option value="Casado(a)" {{ old('estado_civil') == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                                <option value="Divorciado(a)" {{ old('estado_civil') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                <option value="Viudo(a)" {{ old('estado_civil') == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección: Información de Contacto -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

                    <!-- Teléfono -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Teléfono <span class="text-red-500">*</span></label>
                        <div class="relative group">
                            <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                   type="text"
                                   name="telefono"
                                   value="{{ old('telefono') }}"
                                   placeholder="Ingrese teléfono"
                                   required>
                            @error('telefono')
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            @enderror
                        </div>
                        @error('telefono')
                        <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dirección -->
                    <div class="md:col-span-2 space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Dirección <span class="text-red-500">*</span></label>
                        <div class="relative group">
                            <textarea class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                      name="direccion"
                                      placeholder="Ingrese dirección"
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
                </div>

                <!-- Sección: Información Adicional -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Ocupación -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Ocupación</label>
                        <div class="relative group">
                            <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                   type="text"
                                   name="ocupacion"
                                   value="{{ old('ocupacion') }}"
                                   placeholder="Ingrese ocupación">
                        </div>
                    </div>

                    <!-- Ocupación Actual -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Ocupación Actual</label>
                        <div class="relative group">
                            <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                   type="text"
                                   name="ocupacion_actual"
                                   value="{{ old('ocupacion_actual') }}"
                                   placeholder="Ingrese ocupación actual">
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 mt-10">
                    <a href="{{ url('admin/pacientes') }}" class="px-6 py-3.5 border border-gray-300/80 text-gray-700/90 rounded-xl hover:bg-gray-50/50 transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-indigo-600 to-purple-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Registrar Paciente</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
