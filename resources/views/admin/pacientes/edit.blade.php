@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 flex items-center justify-center p-4">
        <div class="w-full max-w-3xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group">
            <!-- Encabezado con efecto de fondo -->
            <div class="relative bg-gradient-to-r from-blue-500 to-purple-700 px-10 pt-8 pb-12 overflow-hidden">
                <div class="relative flex flex-col items-center space-y-4 text-center">
                    <div class="p-4 bg-white/10 rounded-full backdrop-blur-sm border-2 border-white/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Modificar paciente {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
                        <p class="mt-2 text-blue-100/90 font-light">Actualiza la información del paciente con los datos más recientes.</p>
                    </div>
                </div>
            </div>

            <!-- Indicador de Progreso de Completado -->
            @php
                $fieldsCompleted = 0;
                $totalFields = 12; // Ajusta según los campos que consideres importantes

                if($paciente->nombres) $fieldsCompleted++;
                if($paciente->apellidos) $fieldsCompleted++;
                if($paciente->cedula && $paciente->cedula != 'Pendiente') $fieldsCompleted++;
                if($paciente->correo) $fieldsCompleted++;
                if($paciente->telefono) $fieldsCompleted++;
                if($paciente->direccion && $paciente->direccion != 'Pendiente') $fieldsCompleted++;
                if($paciente->fecha_nacimiento) $fieldsCompleted++;
                if($paciente->sexo) $fieldsCompleted++;
                if($paciente->edad) $fieldsCompleted++;
                if($paciente->ocupacion) $fieldsCompleted++;
                if($paciente->estado_civil) $fieldsCompleted++;
                if($paciente->ocupacion_actual) $fieldsCompleted++;

                $percentComplete = round(($fieldsCompleted / $totalFields) * 100);
            @endphp

            <div class="px-10 pt-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Perfil completado: {{ $percentComplete }}%</span>
                    <span class="text-sm font-medium text-blue-600">{{ $fieldsCompleted }}/{{ $totalFields }} campos</span>
                </div>
                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full" style="width: {{ $percentComplete }}%"></div>
                </div>
            </div>

            <form id="pacienteForm" action="{{ url('/admin/pacientes', $paciente->id)}}" method="POST" class="px-10 py-8 space-y-6">
                @csrf
                @method('PUT')

                @if (session('error'))
                    <div class="bg-rose-100/90 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-center space-x-3 animate-fade-in">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Título de Sección: Datos Personales -->
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-slate-700">Datos Personales</h3>
                    <p class="text-sm text-slate-500">Información básica de identificación</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Campo de Nombres -->
                    <div class="space-y-1">
                        <label for="nombres" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Nombres <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nombres" name="nombres" value="{{ $paciente->nombres }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               aria-required="true"
                               aria-label="Nombres del paciente"
                               required>
                        <p class="text-xs text-slate-500 mt-1 ml-1">Nombres completos del paciente.</p>
                        @error('nombres')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Apellidos -->
                    <div class="space-y-1">
                        <label for="apellidos" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Apellidos <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="apellidos" name="apellidos" value="{{ $paciente->apellidos }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               aria-required="true"
                               aria-label="Apellidos del paciente"
                               required>
                        <p class="text-xs text-slate-500 mt-1 ml-1">Apellidos completos del paciente.</p>
                        @error('apellidos')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Cédula -->
                    <div class="space-y-1">
                        <label for="cedula" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Cédula <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center space-x-2">
                            <select class="w-16 p-2 border border-slate-200 rounded-md bg-slate-50/70 text-slate-600 focus:outline-none"
                                    name="nacionalidad"
                                    id="nacionalidad"
                                    aria-label="Nacionalidad">
                                <option value="V" {{ substr($paciente->cedula, 0, 1) == 'V' ? 'selected' : '' }}>V</option>
                                <option value="E" {{ substr($paciente->cedula, 0, 1) == 'E' ? 'selected' : '' }}>E</option>
                            </select>
                            <input type="text" name="cedula" id="cedula" value="{{ substr($paciente->cedula, 2) }}"
                                   class="flex-1 mt-1 block w-full border border-slate-200 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                   placeholder="Ingrese cédula"
                                   aria-required="true"
                                   aria-label="Número de cédula"
                                   required>
                        </div>
                        <p class="text-xs text-slate-500 mt-1 ml-1">Ingrese su nacionalidad y número de identificación sin puntos ni espacios.</p>
                        @error('cedula')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Fecha de Nacimiento -->
                    <div class="space-y-1">
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               aria-label="Fecha de nacimiento">
                        <p class="text-xs text-slate-500 mt-1 ml-1">La edad se calculará automáticamente al seleccionar la fecha.</p>
                        @error('fecha_nacimiento')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Edad -->
                    <div class="space-y-1">
                        <label for="edad" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Edad
                        </label>
                        <input type="number" name="edad" id="edad" value="{{ $paciente->edad }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               placeholder="Ingrese edad"
                               aria-label="Edad del paciente">
                        @error('edad')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Sexo -->
                    <div class="space-y-1">
                        <label for="sexo" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Sexo
                        </label>
                        <select name="sexo" id="sexo"
                                class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                aria-label="Sexo del paciente">
                            <option value="" disabled {{ old('sexo', $paciente->sexo ?? '') == '' ? 'selected' : '' }}>Seleccione</option>
                            <option value="Masculino" {{ old('sexo', $paciente->sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('sexo', $paciente->sexo ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('sexo')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Estado Civil -->
                    <div class="space-y-1">
                        <label for="estado_civil" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Estado Civil
                        </label>
                        <select name="estado_civil" id="estado_civil"
                                class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                aria-label="Estado civil del paciente">
                            <option value="" disabled {{ old('estado_civil', $paciente->estado_civil ?? '') == '' ? 'selected' : '' }}>Seleccione</option>
                            <option value="Soltero(a)" {{ old('estado_civil', $paciente->estado_civil ?? '') == 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                            <option value="Casado(a)" {{ old('estado_civil', $paciente->estado_civil ?? '') == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                            <option value="Divorciado(a)" {{ old('estado_civil', $paciente->estado_civil ?? '') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                            <option value="Viudo(a)" {{ old('estado_civil', $paciente->estado_civil ?? '') == 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                        </select>
                        @error('estado_civil')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Título de Sección: Información de Contacto -->
                <div class="mb-4 mt-8">
                    <h3 class="text-lg font-medium text-slate-700">Información de Contacto</h3>
                    <p class="text-sm text-slate-500">Datos para comunicarnos con el paciente</p>
                </div>

                <fieldset class="border border-slate-200 rounded-md p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                Correo <span class="text-red-500">*</span>
                            </label>
                            <input class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                   type="email"
                                   name="email"
                                   id="email"
                                   value="{{ $paciente->correo }}"
                                   placeholder="Ingrese correo"
                                   aria-required="true"
                                   aria-label="Correo electrónico"
                                   required>
                            <p class="text-xs text-slate-500 mt-1 ml-1">Usaremos este correo para enviar notificaciones importantes.</p>
                            @error('email')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="telefono" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                Teléfono <span class="text-red-500">*</span>
                            </label>
                            <input class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                   type="text"
                                   name="telefono"
                                   id="telefono"
                                   value="{{ $paciente->telefono }}"
                                   placeholder="Ingrese su teléfono"
                                   aria-required="true"
                                   aria-label="Número de teléfono"
                                   required>
                            <p class="text-xs text-slate-500 mt-1 ml-1">Preferiblemente número de celular con WhatsApp.</p>
                            @error('telefono')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label for="direccion" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                Dirección <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                      name="direccion"
                                      id="direccion"
                                      placeholder="Ingrese dirección"
                                      aria-required="true"
                                      aria-label="Dirección de residencia"
                                      required>{{ $paciente->direccion }}</textarea>
                            <p class="text-xs text-slate-500 mt-1 ml-1">Incluya ciudad, estado y referencias importantes.</p>
                            @error('direccion')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Título de Sección: Información Adicional -->
                <div class="mb-4 mt-8">
                    <h3 class="text-lg font-medium text-slate-700">Información Adicional</h3>
                    <p class="text-sm text-slate-500">Datos complementarios para su ficha</p>
                </div>

                <fieldset class="border border-slate-200 rounded-md p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="ocupacion" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                Ocupación
                            </label>
                            <input class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                   type="text"
                                   name="ocupacion"
                                   id="ocupacion"
                                   value="{{ $paciente->ocupacion }}"
                                   placeholder="Ingrese ocupación"
                                   aria-label="Ocupación o profesión">
                            <p class="text-xs text-slate-500 mt-1 ml-1">Profesión o actividad principal.</p>
                            @error('ocupacion')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="ocupacion_actual" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                Ocupación Actual
                            </label>
                            <input class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                   type="text"
                                   name="ocupacion_actual"
                                   id="ocupacion_actual"
                                   value="{{ $paciente->ocupacion_actual }}"
                                   placeholder="Ingrese ocupación actual"
                                   aria-label="Ocupación actual">
                            <p class="text-xs text-slate-500 mt-1 ml-1">Trabajo o actividad que realiza actualmente.</p>
                            @error('ocupacion_actual')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Sección de Cambio de Contraseña (solo visible para el usuario propietario del perfil) -->
                @if(auth()->user() && $paciente->user_id && auth()->user()->id == $paciente->user_id)
                    <!-- Título de Sección: Seguridad de la Cuenta -->
                    <div class="mb-4 mt-8">
                        <h3 class="text-lg font-medium text-slate-700">Seguridad de la Cuenta</h3>
                        <p class="text-sm text-slate-500">Actualiza tu contraseña para mantener tu cuenta segura</p>
                    </div>

                    <fieldset class="border border-slate-200 rounded-md p-4">
                        <div class="grid grid-cols-1 gap-4">
                            <!-- Contraseña actual -->
                            <div class="space-y-1">
                                <label for="current_password" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                    Contraseña Actual <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group">
                                    <input id="current_password" type="password" name="current_password"
                                           class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                           placeholder="Ingrese su contraseña actual">
                                    <button type="button" class="toggle-password absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600" data-target="current_password">
                                        <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-slate-500 mt-1 ml-1">Ingrese su contraseña actual para verificar su identidad</p>
                                @error('current_password')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Nueva contraseña -->
                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                    Nueva Contraseña <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group">
                                    <input id="password" type="password" name="password"
                                           class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                           placeholder="Ingrese nueva contraseña">
                                    <button type="button" class="toggle-password absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600" data-target="password">
                                        <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-slate-500 mt-1 ml-1">Mínimo 8 caracteres, debe incluir letras y números</p>
                                @error('password')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirmar nueva contraseña -->
                            <div class="space-y-1">
                                <label for="password_confirmation" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                                    Confirmar Nueva Contraseña <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group">
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                           class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                           placeholder="Confirme nueva contraseña">
                                    <button type="button" class="toggle-password absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600" data-target="password_confirmation">
                                        <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-slate-500 mt-1 ml-1">Vuelva a ingresar su nueva contraseña para confirmar</p>
                                @error('password_confirmation')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="flex items-center mt-2">
                                <input type="checkbox" id="change_password" name="change_password" class="h-4 w-4 text-blue-600 rounded">
                                <label for="change_password" class="ml-2 block text-sm text-slate-600">
                                    Marque esta casilla para actualizar su contraseña
                                </label>
                            </div>
                        </div>
                    </fieldset>
                @endif

                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ url('admin/pacientes') }}" class="px-6 py-3.5 border-2 border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50/50 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-4 h-4 text-slate-500 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>

                    <button type="button" id="previewBtn" class="px-6 py-3.5 border-2 border-blue-300 text-blue-700 rounded-xl hover:bg-blue-50/50 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span class="font-medium">Previsualizar</span>
                    </button>

                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-medium">Actualizar</span>
                    </button>
                </div>
            </form>

            <!-- Modal de Previsualización -->
            <div id="previewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[80vh] overflow-y-auto">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-4">Resumen de Información</h2>
                        <!-- El contenido se llenará con JavaScript -->
                        <div id="previewContent" class="space-y-4"></div>
                        <div class="flex justify-end mt-6 space-x-3">
                            <button type="button" id="closePreview" class="px-4 py-2 border border-gray-300 rounded-lg">
                                Volver al formulario
                            </button>
                            <button type="submit" form="pacienteForm" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                                Confirmar y actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cálculo automático de edad
            const fechaNacInput = document.getElementById('fecha_nacimiento');
            const edadInput = document.getElementById('edad');

            if (fechaNacInput && edadInput) {
                fechaNacInput.addEventListener('change', function() {
                    if (this.value) {
                        const birthDate = new Date(this.value);
                        const today = new Date();
                        let age = today.getFullYear() - birthDate.getFullYear();
                        const monthDiff = today.getMonth() - birthDate.getMonth();

                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }

                        edadInput.value = age;
                    }
                });
            }

            // Funcionalidad del modal de previsualización
            const previewBtn = document.getElementById('previewBtn');
            const modal = document.getElementById('previewModal');
            const closeBtn = document.getElementById('closePreview');
            const form = document.getElementById('pacienteForm');

            if (previewBtn && modal && closeBtn && form) {
                previewBtn.addEventListener('click', function() {
                    // Recopilar datos del formulario
                    const formData = new FormData(form);
                    let html = '';

                    // Crear grupos para organizar la información
                    const groups = {
                        'Datos Personales': ['nombres', 'apellidos', 'nacionalidad', 'cedula', 'fecha_nacimiento', 'edad', 'sexo', 'estado_civil'],
                        'Contacto': ['email', 'telefono', 'direccion'],
                        'Información Adicional': ['ocupacion', 'ocupacion_actual']
                    };

                    // Construir HTML para cada grupo
                    for (const [groupName, fields] of Object.entries(groups)) {
                        html += `<div class="mt-4"><h3 class="font-semibold text-gray-800">${groupName}</h3><dl class="mt-2 grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2">`;

                        fields.forEach(field => {
                            let value = formData.get(field);

                            // Manejar casos especiales
                            if (field === 'cedula') {
                                if (value) {
                                    value = formData.get('nacionalidad') + '-' + value;
                                }
                            } else if (field === 'nacionalidad') {
                                return; // Saltamos este campo porque ya lo usamos con cedula
                            } else if (field === 'sexo' || field === 'estado_civil') {
                                // Para campos select, obtener el texto seleccionado
                                const select = document.getElementById(field);
                                if (select && select.selectedIndex > 0) {
                                    value = select.options[select.selectedIndex].text;
                                }
                            }

                            if (value) {
                                const labelElement = document.querySelector(`label[for="${field}"]`);
                                let labelText = '';

                                if (labelElement) {
                                    labelText = labelElement.textContent.replace(' *', '').trim();
                                } else {
                                    // Fallback para nombres de campo
                                    labelText = field.charAt(0).toUpperCase() + field.slice(1).replace('_', ' ');
                                }

                                html += `
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">${labelText}</dt>
                                <dd class="mt-1 text-sm text-gray-900">${value}</dd>
                            </div>`;
                            }
                        });

                        html += `</dl></div>`;
                    }

                    // Si se está cambiando la contraseña, añadir esa sección al preview
                    if (formData.get('change_password')) {
                        html += `
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-800">Cambio de Contraseña</h3>
                        <p class="text-sm text-gray-600 mt-2">Se actualizará su contraseña con los datos ingresados.</p>
                    </div>`;
                    }

                    document.getElementById('previewContent').innerHTML = html;
                    modal.classList.remove('hidden');
                });

                closeBtn.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                // Cerrar con clic fuera del modal
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            }

            // Funcionalidad para mostrar/ocultar contraseñas
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const eyeOpen = this.querySelector('.eye-open');
                    const eyeClosed = this.querySelector('.eye-closed');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeOpen.classList.add('hidden');
                        eyeClosed.classList.remove('hidden');
                    } else {
                        passwordInput.type = 'password';
                        eyeOpen.classList.remove('hidden');
                        eyeClosed.classList.add('hidden');
                    }
                });
            });
        });
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
