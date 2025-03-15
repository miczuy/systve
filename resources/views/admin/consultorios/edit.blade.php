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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Modificar Consultorio</h1>
                        <p class="mt-2 text-blue-100/90 font-light">Actualiza la información del consultorio con los datos más recientes.</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/consultorios', $consultorio->id) }}" method="POST" class="px-10 py-8 space-y-6">
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
                    <!-- Campo de Nombre -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Nombre del Consultorio
                        </label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $consultorio->nombre) }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               required>
                        @error('nombre')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Ubicación -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Ubicación
                        </label>
                        <select name="ubicacion" id="ubicacion" class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                            <option value="" disabled>Seleccione una ubicación</option>
                            <option value="PB" {{ old('ubicacion', $consultorio->ubicacion) == 'PB' ? 'selected' : '' }}>PB (Planta Baja)</option>
                            <option value="Laboratorio" {{ old('ubicacion', $consultorio->ubicacion) == 'Laboratorio' ? 'selected' : '' }}>Laboratorio</option>
                            <option value="Consultorio 1" {{ old('ubicacion', $consultorio->ubicacion) == 'Consultorio 1' ? 'selected' : '' }}>Consultorio 1</option>
                            <option value="Consultorio 2" {{ old('ubicacion', $consultorio->ubicacion) == 'Consultorio 2' ? 'selected' : '' }}>Consultorio 2</option>
                            <option value="Sala de Espera" {{ old('ubicacion', $consultorio->ubicacion) == 'Sala de Espera' ? 'selected' : '' }}>Sala de Espera</option>
                            <option value="Área de Emergencias" {{ old('ubicacion', $consultorio->ubicacion) == 'Área de Emergencias' ? 'selected' : '' }}>Área de Emergencias</option>
                        </select>
                        @error('ubicacion')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Capacidad -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" view Box="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4"/>
                            </svg>
                            Capacidad
                        </label>
                        <input type="text" id="capacidad" name="capacidad" value="{{ old('capacidad', $consultorio->capacidad) }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               required>
                        @error('capacidad')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Teléfono -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Teléfono
                        </label>
                        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $consultorio->telefono) }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               required>
                        @error('telefono')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>

                    <!-- Campo de Especialidad -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-slate-600/90 mb-2 ml-1 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4"/>
                            </svg>
                            Especialidad
                        </label>
                        <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad', $consultorio->especialidad) }}"
                               class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm"
                               required>
                        @error('especialidad')
                        <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ url('admin/consultorios') }}" class="px-6 py-3.5 border-2 border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50/50 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-4 h-4 text-slate-500 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-medium">Actualizar Consultorio</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .bg-medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1 .79-4-4-4-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
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
