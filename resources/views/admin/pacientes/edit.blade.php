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

            <form action="{{ url('/admin/pacientes', $paciente->id)}}" method="POST" class="px-10 py-8 space-y-6">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Campo de Nombres -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Nombres <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nombres" name="nombres" value="{{ $paciente->nombres }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               required>
                        @error('nombres')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Apellidos -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Apellidos <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="apellidos" name="apellidos" value="{{ $paciente->apellidos }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               required>
                        @error('apellidos')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Cédula -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Cédula <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center space-x-2">
                            <select class="w-16 p-2 border border-slate-200 rounded-md bg-slate-50/70 text-slate-600 focus:outline-none" name="nacionalidad" id="nacionalidad">
                                <option value="V" {{ substr($paciente->cedula, 0, 1) == 'V' ? 'selected' : '' }}>V</option>
                                <option value="E" {{ substr($paciente->cedula, 0, 1) == 'E' ? 'selected' : '' }}>E</option>
                            </select>
                            <input type="text" name="cedula" id="cedula" value="{{ substr($paciente->cedula, 2) }}"
                                   class="flex-1 mt-1 block w-full border border-slate-200 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                                   placeholder="Ingrese cédula" required>
                        </div>
                        @error('cedula')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Fecha de Nacimiento -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                        @error('fecha_nacimiento')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Edad -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Edad
                        </label>
                        <input type="number" name="edad" id="edad" value="{{ $paciente->edad }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               placeholder="Ingrese edad">
                        @error('edad')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Sexo -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Sexo
                        </label>
                        <select name="sexo" id="sexo"
                                class="mt-1 block w-full border border-slate-200 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
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
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Estado Civil
                        </label>
                        <select name="estado_civil" id="estado_civil"
                                class="mt-1 block w-full border border-slate-200 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration- 200 shadow-sm">
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

                <fieldset class="border border-slate-200 rounded-md p-4">
                    <legend class="text-sm font-medium text-slate-600">Información de Contacto</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center" for="email">Correo <span class="text-red-500">*</span></label>
                            <input class="w-full mt-1 p-2 border border-slate-200 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" type="email" name="email" id="email" value="{{ $paciente->correo }}" placeholder="Ingrese correo" required>
                            @error('email')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center" for="telefono">Teléfono <span class="text-red-500">*</span></label>
                            <input class="w-full mt-1 p-2 border border-slate-200 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" type="text" name="telefono" id="telefono" value="{{ $paciente->telefono }}" placeholder="Ingrese su teléfono" required>
                            @error('telefono')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center" for="direccion">Dirección <span class="text-red-500">*</span></label>
                            <textarea class="w-full mt-1 p-2 border border-slate-200 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" name="direccion" id="direccion" placeholder="Ingrese dirección" required>{{ $paciente->direccion }}</textarea>
                            @error('direccion')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border border-slate-200 rounded-md p-4">
                    <legend class="text-sm font-medium text-slate-600">Información Adicional</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center" for="ocupacion">Ocupación</label>
                            <input class="w-full mt-1 p-2 border border-slate-200 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" type="text" name="ocupacion" id="ocupacion" value="{{ $paciente->ocupacion }}" placeholder="Ingrese ocupación">
                            @error('ocupacion')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center" for="ocupacion_actual">Ocupación Actual</label>
                            <input class="w-full mt-1 p-2 border border-slate-200 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" type="text" name="ocupacion_actual" id="ocupacion_actual" value="{{ $paciente->ocupacion_actual }}" placeholder="Ingrese ocupación actual">
                            @error('ocupacion_actual')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ url('admin/pacientes') }}" class="px-6 py-3.5 border-2 border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50/50 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-4 h-4 text-slate-500 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-medium">Actualizar</span>
                    </button>
                </div>
            </form>
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
