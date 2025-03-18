<!-- resources/views/admin/mascotas/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="bg-gradient-to-br from-teal-50 to-purple-50 min-h-screen py-8">
        <div class="container mx-auto px-4 max-w-5xl">
            <!-- Cabecera -->
            <div class="bg-white rounded-2xl shadow-lg mb-8 overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                <div class="relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-purple-500 opacity-90"></div>
                    <div class="relative flex flex-col items-center justify-center p-8">
                        <div class="bg-white/20 backdrop-blur-sm p-4 rounded-full mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-white mb-2">Registrar Nueva Mascota</h1>
                        <p class="text-white/80 max-w-lg text-center">Complete la información para registrar una nueva mascota en el sistema. Los campos marcados con * son obligatorios.</p>
                    </div>
                </div>

                <!-- Pasos de registro -->
                <div class="p-6 bg-gradient-to-r from-teal-50 to-purple-50">
                    <div class="flex flex-wrap md:flex-nowrap justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-bold shadow-md">1</div>
                            <div class="ml-3">
                                <span class="text-teal-800 font-semibold">Información básica</span>
                                <p class="text-xs text-teal-600">Datos principales de la mascota</p>
                            </div>
                        </div>
                        <div class="hidden md:block w-full md:w-auto">
                            <div class="h-0.5 w-16 bg-gradient-to-r from-teal-300 to-indigo-300 rounded my-5"></div>
                        </div>
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold shadow-md">2</div>
                            <div class="ml-3">
                                <span class="text-indigo-800 font-semibold">Información médica</span>
                                <p class="text-xs text-indigo-600">Historial y condiciones médicas</p>
                            </div>
                        </div>
                        <div class="hidden md:block w-full md:w-auto">
                            <div class="h-0.5 w-16 bg-gradient-to-r from-indigo-300 to-purple-300 rounded my-5"></div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold shadow-md">3</div>
                            <div class="ml-3">
                                <span class="text-purple-800 font-semibold">Foto</span>
                                <p class="text-xs text-purple-600">Imagen de la mascota</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('mensaje'))
                <div class="bg-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-50 border-l-4 border-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-500 p-5 mb-8 rounded-xl shadow-sm transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            @if(session('icono') === 'success')
                                <svg class="h-6 w-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @else
                                <svg class="h-6 w-6 text-rose-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-800">
                                {{ session('icono') === 'success' ? '¡Operación exitosa!' : '¡Ha ocurrido un error!' }}
                            </h3>
                            <p class="mt-1 text-sm text-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-700">{{ session('mensaje') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.mascotas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Información básica -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                    <div class="relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-teal-600 opacity-90"></div>
                        <div class="relative px-6 py-4 flex items-center">
                            <div class="bg-white/20 backdrop-blur-sm p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white">Información básica</h2>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Paciente (dueño) -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="paciente_id" class="block text-sm font-medium text-gray-700 mb-2">Dueño de la mascota*</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <select name="paciente_id" id="paciente_id" class="block w-full pl-10 pr-10 py-3 border-gray-300 bg-gray-50 focus:ring-teal-500 focus:border-teal-500 rounded-lg shadow-sm @error('paciente_id') border-rose-500 @enderror" required>
                                        <option value="">Seleccione un propietario</option>
                                        @foreach($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                                {{ $paciente->apellidos }}, {{ $paciente->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('paciente_id')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre de la mascota*</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="pl-10 block w-full border-gray-300 bg-gray-50 rounded-lg py-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('nombre') border-rose-500 @enderror" placeholder="Nombre de la mascota" required>
                                </div>
                                @error('nombre')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Especie -->
                            <div>
                                <label for="especie" class="block text-sm font-medium text-gray-700 mb-2">Especie*</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <select name="especie" id="especie" class="pl-10 pr-10 py-3 block w-full border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('especie') border-rose-500 @enderror" required>
                                        <option value="">Seleccione la especie</option>
                                        <option value="Perro" {{ old('especie') == 'Perro' ? 'selected' : '' }}>Perro</option>
                                        <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                                        <option value="Ave" {{ old('especie') == 'Ave' ? 'selected' : '' }}>Ave</option>
                                        <option value="Roedor" {{ old('especie') == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                                        <option value="Reptil" {{ old('especie') == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                                        <option value="Otro" {{ old('especie') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('especie')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Raza -->
                            <div>
                                <label for="raza" class="block text-sm font-medium text-gray-700 mb-2">Raza</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="raza" id="raza" value="{{ old('raza') }}" class="pl-10 block w-full border-gray-300 bg-gray-50 rounded-lg py-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('raza') border-rose-500 @enderror" placeholder="Raza de la mascota">
                                </div>
                                @error('raza')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Color -->
                            <div>
                                <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                        </svg>
                                    </div>
                                    <input type="text" name="color" id="color" value="{{ old('color') }}" class="pl-10 block w-full border-gray-300 bg-gray-50 rounded-lg py-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('color') border-rose-500 @enderror" placeholder="Color del pelaje">
                                </div>
                                @error('color')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sexo con botones estilizados -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sexo</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="relative flex items-center justify-center p-4 border border-gray-200 rounded-xl bg-white cursor-pointer transition-all duration-300 hover:bg-gray-50 hover:border-teal-200 sex-option">
                                        <input type="radio" name="sexo" value="Macho" class="absolute opacity-0 w-0 h-0" {{ old('sexo') == 'Macho' ? 'checked' : '' }}>
                                        <div class="flex items-center">
                                            <span class="w-5 h-5 inline-block rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 sex-radio"></span>
                                            <div>
                                                <span class="block font-medium">Macho</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border border-gray-200 rounded-xl bg-white cursor-pointer transition-all duration-300 hover:bg-gray-50 hover:border-teal-200 sex-option">
                                        <input type="radio" name="sexo" value="Hembra" class="absolute opacity-0 w-0 h-0" {{ old('sexo') == 'Hembra' ? 'checked' : '' }}>
                                        <div class="flex items-center">
                                            <span class="w-5 h-5 inline-block rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 sex-radio"></span>
                                            <div>
                                                <span class="block font-medium">Hembra</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @error('sexo')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fecha de nacimiento -->
                            <div>
                                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-2">Fecha de nacimiento</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="pl-10 block w-full border-gray-300 bg-gray-50 rounded-lg py-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('fecha_nacimiento') border-rose-500 @enderror">
                                </div>
                                @error('fecha_nacimiento')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Peso con unidad -->
                            <div>
                                <label for="peso" class="block text-sm font-medium text-gray-700 mb-2">Peso (kg)</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                    <input type="number" name="peso" id="peso" value="{{ old('peso') }}" step="0.01" min="0.1" max="999.99" class="pl-10 pr-12 block w-full border-gray-300 bg-gray-50 rounded-lg py-3 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('peso') border-rose-500 @enderror" placeholder="0.00">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm font-medium">kg</span>
                                    </div>
                                </div>
                                @error('peso')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Esterilizado con toggle switch -->
                            <div>
                                <div class="flex items-center justify-between bg-gray-50 p-4 rounded-xl border border-gray-200">
                                    <div>
                                        <label for="esterilizado" class="text-sm font-medium text-gray-700">Esterilizado/a</label>
                                        <p class="text-xs text-gray-500 mt-1">Indica si la mascota está esterilizada</p>
                                    </div>
                                    <label for="esterilizado" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="esterilizado" name="esterilizado" value="1" class="sr-only" {{ old('esterilizado') ? 'checked' : '' }}>
                                            <div class="block bg-gray-300 w-14 h-7 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Estado -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado de la mascota*</label>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div>
                                        <input type="radio" id="estado-activo" name="estado" value="Activo" class="hidden peer" {{ old('estado', 'Activo') == 'Activo' ? 'checked' : '' }} required>
                                        <label for="estado-activo" class="flex flex-col items-center justify-center p-4 w-full h-full text-gray-500 bg-white border border-gray-200 rounded-xl cursor-pointer peer-checked:border-teal-600 peer-checked:bg-teal-50 peer-checked:text-teal-600 hover:bg-gray-50 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="font-medium">Activo</span>
                                            <span class="text-xs mt-1">En tratamiento o seguimiento</span>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="estado-inactivo" name="estado" value="Inactivo" class="hidden peer" {{ old('estado') == 'Inactivo' ? 'checked' : '' }}>
                                        <label for="estado-inactivo" class="flex flex-col items-center justify-center p-4 w-full h-full text-gray-500 bg-white border border-gray-200 rounded-xl cursor-pointer peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:text-amber-600 hover:bg-gray-50 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <span class="font-medium">Inactivo</span>
                                            <span class="text-xs mt-1">Sin visitas recientes</span>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="estado-fallecido" name="estado" value="Fallecido" class="hidden peer" {{ old('estado') == 'Fallecido' ? 'checked' : '' }}>
                                        <label for="estado-fallecido" class="flex flex-col items-center justify-center p-4 w-full h-full text-gray-500 bg-white border border-gray-200 rounded-xl cursor-pointer peer-checked:border-rose-600 peer-checked:bg-rose-50 peer-checked:text-rose-600 hover:bg-gray-50 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="font-medium">Fallecido</span>
                                            <span class="text-xs mt-1">Mascota fallecida</span>
                                        </label>
                                    </div>
                                </div>
                                @error('estado')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información médica -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                    <div class="relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-indigo-600 opacity-90"></div>
                        <div class="relative px-6 py-4 flex items-center">
                            <div class="bg-white/20 backdrop-blur-sm p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white">Información médica</h2>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Características especiales -->
                            <div>
                                <label for="caracteristicas_especiales" class="block text-sm font-medium text-gray-700 mb-2">Características especiales</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <textarea name="caracteristicas_especiales" id="caracteristicas_especiales" rows="4" class="block w-full border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('caracteristicas_especiales') border-rose-500 @enderror" placeholder="Manchas, cicatrices, marcas distintivas...">{{ old('caracteristicas_especiales') }}</textarea>
                                    <div class="absolute top-3 right-3 bg-white/80 rounded-full p-1.5 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('caracteristicas_especiales')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alergias -->
                            <div>
                                <label for="alergias" class="block text-sm font-medium text-gray-700 mb-2">Alergias</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <textarea name="alergias" id="alergias" rows="4" class="block w-full border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('alergias') border-rose-500 @enderror" placeholder="Medicamentos, alimentos, ambientales...">{{ old('alergias') }}</textarea>
                                    <div class="absolute top-3 right-3 bg-white/80 rounded-full p-1.5 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('alergias')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Condiciones médicas -->
                            <div>
                                <label for="condiciones_medicas" class="block text-sm font-medium text-gray-700 mb-2">Condiciones médicas</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <textarea name="condiciones_medicas" id="condiciones_medicas" rows="4" class="block w-full border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('condiciones_medicas') border-rose-500 @enderror" placeholder="Enfermedades crónicas, condiciones especiales...">{{ old('condiciones_medicas') }}</textarea>
                                    <div class="absolute top-3 right-3 bg-white/80 rounded-full p-1.5 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('condiciones_medicas')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Medicación actual -->
                            <div>
                                <label for="medicacion_actual" class="block text-sm font-medium text-gray-700 mb-2">Medicación actual</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <textarea name="medicacion_actual" id="medicacion_actual" rows="4" class="block w-full border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('medicacion_actual') border-rose-500 @enderror" placeholder="Medicamentos, dosis, frecuencia...">{{ old('medicacion_actual') }}</textarea>
                                    <div class="absolute top-3 right-3 bg-white/80 rounded-full p-1.5 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                    </div>
                                </div>
                                @error('medicacion_actual')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Foto -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                    <div class="relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-purple-600 opacity-90"></div>
                        <div class="relative px-6 py-4 flex items-center">
                            <div class="bg-white/20 backdrop-blur-sm p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-white">Foto de la mascota</h2>
                        </div>
                    </div>

                    <div class="p-8">
                        <div id="drop-area" class="border-3 border-dashed border-purple-200 bg-purple-50 rounded-xl p-10 text-center hover:bg-purple-100 hover:border-purple-300 transition-colors duration-300">
                            <input type="file" name="foto" id="foto" class="hidden" accept="image/jpeg,image/png,image/jpg">
                            <label for="foto" class="cursor-pointer block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-purple-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div class="space-y-2">
                                    <p class="text-xl font-medium text-purple-700">Seleccionar una imagen</p>
                                    <p class="text-sm text-purple-600">O arrastra y suelta una imagen aquí</p>
                                    <p class="text-xs text-purple-500 mt-2">Formatos: JPG, JPEG, PNG (Máx. 2MB)</p>
                                </div>
                            </label>
                        </div>

                        <div id="preview-container" class="hidden mt-6 text-center">
                            <p class="text-sm font-medium text-gray-700 mb-3">Vista previa de la imagen:</p>
                            <div class="relative inline-block bg-white rounded-xl p-2 shadow-lg border border-purple-100">
                                <img id="preview-image" src="#" alt="Vista previa" class="h-64 w-auto object-cover rounded-lg">
                                <button type="button" id="remove-image" class="absolute -top-3 -right-3 bg-rose-500 text-white rounded-full p-2 shadow-md hover:bg-rose-600 transition-colors duration-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        @error('foto')
                        <div class="mt-4 bg-rose-50 border-l-4 border-rose-500 p-4 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-rose-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-rose-700">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
                    <a href="{{ route('admin.mascotas.index') }}" class="flex items-center justify-center py-3 px-6 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-xl shadow-sm transition-colors duration-300 order-2 sm:order-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver al listado
                    </a>
                    <button type="submit" class="flex items-center justify-center py-3 px-6 bg-gradient-to-r from-teal-500 to-purple-600 hover:from-teal-600 hover:to-purple-700 text-white rounded-xl shadow-md transition-all duration-300 transform hover:-translate-y-1 font-medium order-1 sm:order-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Guardar información
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Estilo para el toggle switch */
        input:checked ~ .dot {
            transform: translateX(100%);
            background-color: #14B8A6;
        }
        input:checked ~ .block {
            background-color: #99F6E4;
        }

        /* Estilo para el radio button del sexo */
        .sex-option.active {
            border-color: #14B8A6;
            background-color: #F0FDFA;
        }

        input[type="radio"]:checked + .sex-radio {
            border-color: #14B8A6;
            background-color: #14B8A6;
            box-shadow: inset 0 0 0 3px white;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejo de la carga de fotos
            const fileInput = document.getElementById('foto');
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');
            const removeButton = document.getElementById('remove-image');
            const dropArea = document.getElementById('drop-area');

            // Previsualización al seleccionar archivo
            fileInput.addEventListener('change', function(event) {
                showPreview(event.target.files[0]);
            });

            // Eliminar imagen
            removeButton.addEventListener('click', function() {
                fileInput.value = '';
                previewContainer.classList.add('hidden');
                dropArea.classList.remove('hidden');
            });

            // Drag and drop
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropArea.classList.add('border-purple-500', 'bg-purple-100');
            }

            function unhighlight() {
                dropArea.classList.remove('border-purple-500', 'bg-purple-100');
            }

            dropArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files.length) {
                    fileInput.files = files;
                    showPreview(files[0]);
                }
            }

            function showPreview(file) {
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                        dropArea.classList.add('hidden');
                    }

                    reader.readAsDataURL(file);
                }
            }

            // Efecto visual para radio buttons del sexo
            const sexOptions = document.querySelectorAll('.sex-option');
            sexOptions.forEach(option => {
                const radio = option.querySelector('input[type="radio"]');

                if (radio.checked) {
                    option.classList.add('active');
                }

                option.addEventListener('click', function() {
                    sexOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    radio.checked = true;
                });
            });
        });
    </script>
@endsection
