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
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Actualización de Enfermera</h1>
                        <p class="mt-2 text-blue-100/90 font-light">Actualiza los datos de la enfermera con la información más reciente.</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/enfermeras', $enfermera->id) }}" method="POST" class="px-10 py-8 space-y-6">
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
                    <div class="space-y-1">
                        <label for="nombres" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Nombres <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nombres" id="nombres" value="{{ old('nombres', $enfermera->nombres) }}" placeholder="Ingrese los nombres"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('nombres')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="apellidos" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Apellidos <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $enfermera->apellidos) }}" placeholder="Ingrese los apellidos"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('apellidos')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="cedula" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Cédula <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="cedula" id="cedula" value="{{ old('cedula', $enfermera->cedula) }}" placeholder="Ingrese la cédula"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('cedula')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Fecha de Nacimiento <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $enfermera->fecha_nacimiento->format('Y-m-d')) }}"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('fecha_nacimiento')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="celular" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Celular <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="celular" id="celular" value="{{ old('celular', $enfermera->celular) }}" placeholder="Ingrese el número de celular"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('celular')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="direccion" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Dirección <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $enfermera->direccion) }}" placeholder="Ingrese la dirección"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('direccion')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Correo <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email', $enfermera->user->email) }}" placeholder="Ingrese el correo electrónico"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                        @error('email')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="password" placeholder="Deja este campo vacío para mantener la contraseña actual"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                        @error('password')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            Verificación de Contraseña
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Deja este campo vacío si no quieres cambiar la contraseña"
                               class="mt-1 block w-full border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                        @error('password_confirmation')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ url('admin/enfermeras') }}" class="px-6 py-3.5 border-2 border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50/50 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-4 h-4 text-slate-500 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-medium">Actualizar Registro</span>
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
