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
                        <h1 class="text-3xl font-bold text-white tracking-tight font-playfair">Modificar Doctor</h1>
                        <p class="mt-2 text-blue-100/90 font-light">Actualiza la información del doctor con los datos más recientes.</p>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <form action="{{ url('/admin/doctores', $doctor->id) }}" method="POST" class="px-10 py-8 space-y-6">
                @csrf
                @method('PUT')

                <!-- Mensaje de error -->
                @if (session('error'))
                    <div class="bg-rose-100/90 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-center space-x-3 animate-fade-in">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Información del doctor -->
                <fieldset class="border border-gray-300 rounded-md p-6">
                    <legend class="text-lg font-medium text-gray-700 text-center">Información del Doctor</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Campo de Nombres -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Nombres del Doctor <span class="text-red-500">*</span></label>
                            <input type="text" name="nombres" id="nombres" value="{{ $doctor->nombres }}" placeholder="Ingrese nombre del doctor"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                            @error('nombres')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Campo de Apellidos -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Apellidos <span class="text-red-500">*</span></label>
                            <input type="text" name="apellidos" id="apellidos" value="{{ $doctor->apellidos }}" placeholder="Ingrese apellidos"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                            @error('apellidos')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Campo de Cédula -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Cédula <span class="text-red-500">*</span></label>
                            <div class="flex items-center space-x-2">
                                <select name="nacionalidad" id="nacionalidad"
                                        class="w-20 px-4 py-3 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                                    <option value="V" {{ explode('-', $doctor->cedula)[0] == 'V' ? 'selected' : '' }}>V</option>
                                    <option value="E" {{ explode('-', $doctor->cedula)[0] == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                                <input type="text" name="cedula" id="cedula" value="{{ explode('-', $doctor->cedula)[1] }}" placeholder="Ingrese cédula"
                                       class="flex-1 px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                            </div>
                            @error('cedula')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Campo de Teléfono -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" value="{{ $doctor->telefono }}" placeholder="Ingrese teléfono"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                            @error('telefono')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Campo de Licencia Médica -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Licencia Médica</label>
                            <input type="text" name="licencia_medica" id="licencia_medica" value="{{ $doctor->licencia_medica }}" placeholder="Ingrese licencia médica"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                            @error('licencia_medica')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Especialidades -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-slate-600/90">Especialidades</label>
                            <div id="specialties-container" class="flex flex-wrap gap-2 mt-2">
                                @foreach($doctor->specialties as $specialty)
                                    <div class="flex items-center space-x-2">
                                        <select name="specialty_ids[]" class="flex-1 px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                                            @foreach($specialties as $option)
                                                <option value="{{ $option->id }}" {{ $option->id == $specialty->id ? 'selected' : '' }}>{{ $option->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" onclick="removeSpecialtyField(this)" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">-</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Botón para agregar especialidad -->
                        <div class="col-span-2 mt-4">
                            <button type="button" onclick="addSpecialtyField()" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">+ Agregar Especialidad</button>
                        </div>

                        <!-- Campo de Correo -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Correo <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ $doctor->user->email }}" placeholder="Ingrese correo"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm" required>
                            @error('email')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Campo de Contraseña -->
                        <div>
                            <label class="block text-sm font-medium text-slate-600/90">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Ingrese contraseña"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                            @error('password')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-slate-600/90">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme su contraseña"
                                   class="mt-1 w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                            @error('password_confirmation')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Botones -->
                <div class="flex justify-center mt-6 space-x-4">
                    <a href="{{ url('admin/doctores') }}" class="px-6 py-2 border-2 border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50/50 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-4 h-4 text-slate-500 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-medium">Cancelar</span>
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-br from-cyan-600 to-blue-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-medium">Actualizar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para manejar especialidades -->
    <script>
        function addSpecialtyField() {
            const container = document.getElementById('specialties-container');
            const newField = document.createElement('div');
            newField.classList.add('flex', 'items-center', 'space-x-2', 'mt-2');

            newField.innerHTML = `
                <select name="specialty_ids[]" class="flex-1 px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm">
                    @foreach($specialties as $specialty)
            <option value="{{ $specialty->id }}">{{ $specialty->nombre }}</option>
                    @endforeach
            </select>
            <button type="button" onclick="removeSpecialtyField(this)" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">-</button>
`;

            container.appendChild(newField);
        }

        function removeSpecialtyField(button) {
            button.parentElement.remove();
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
