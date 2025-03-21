<!-- resources/views/paciente/mascotas/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen pb-20">
        <!-- Header flotante con acciones rápidas -->
        <div class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm shadow-md border-b border-gray-200">
            <div class="container mx-auto px-4 py-3">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('paciente.mascotas.index') }}" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800 flex items-center">
                                Editar: <span class="text-blue-600 ml-2">{{ $mascota->nombre }}</span>
                                <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $mascota->estado == 'Activo' ? 'bg-green-100 text-green-800' :
                                ($mascota->estado == 'Inactivo' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $mascota->estado }}
                            </span>
                            </h1>
                            <p class="text-sm text-gray-500">Actualiza la información de tu mascota</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('paciente.mascotas.show', $mascota) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Ver perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertas -->
        @if(session('mensaje'))
            <div class="container mx-auto px-4 mt-4">
                <div class="transform transition-all duration-300 ease-in-out {{ session('icono') === 'success' ? 'bg-green-50 border-green-500' : 'bg-red-50 border-red-500' }} border-l-4 p-4 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @if(session('icono') === 'success')
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @else
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium {{ session('icono') === 'success' ? 'text-green-700' : 'text-red-700' }}">{{ session('mensaje') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container mx-auto px-4 pt-6">
            <form action="{{ route('paciente.mascotas.update', $mascota) }}" method="POST" enctype="multipart/form-data" id="form-mascota">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Columna 1: Foto y datos básicos -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                            <div class="px-6 py-4 bg-gradient-to-r from-indigo-500 to-purple-500">
                                <h2 class="text-lg font-bold text-white">Foto de la mascota</h2>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col items-center space-y-4">
                                    @if($mascota->foto)
                                        <div class="relative rounded-full w-36 h-36 overflow-hidden border-4 border-white shadow-lg">
                                            <img src="{{ Storage::url($mascota->foto) }}" alt="Foto de {{ $mascota->nombre }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="rounded-full w-36 h-36 bg-gray-200 flex items-center justify-center text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="mt-2 w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            {{ $mascota->foto ? 'Cambiar foto' : 'Subir una foto' }}
                                        </label>
                                        <label for="foto" class="cursor-pointer flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            Seleccionar archivo
                                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg" onchange="previewImage(event)">
                                        </label>
                                        <p class="mt-1 text-xs text-gray-500">
                                            JPG, JPEG, PNG hasta 2MB
                                        </p>
                                    </div>

                                    <div id="image-preview" class="hidden mt-4 w-full">
                                        <p class="text-sm font-medium text-gray-700 mb-1">Vista previa:</p>
                                        <div class="relative w-full h-32 overflow-hidden rounded-lg">
                                            <img id="preview-img" src="#" alt="Vista previa" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-indigo-500 to-purple-500">
                                <h2 class="text-lg font-bold text-white">Estado y opciones</h2>
                            </div>
                            <div class="p-6 space-y-4">
                                <!-- Estado -->
                                <div>
                                    <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">
                                        Estado de la mascota <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-3 gap-2">
                                        <label class="relative cursor-pointer border rounded-md px-3 py-2 flex items-center justify-center
                                                {{ old('estado', $mascota->estado) == 'Activo' ? 'bg-green-50 border-green-500 ring-2 ring-green-200' : 'bg-white border-gray-300' }}"
                                               for="estado-activo">
                                            <input type="radio" id="estado-activo" name="estado" value="Activo"
                                                   class="sr-only" {{ old('estado', $mascota->estado) == 'Activo' ? 'checked' : '' }} required>
                                            <span class="flex items-center justify-center text-sm {{ old('estado', $mascota->estado) == 'Activo' ? 'text-green-700 font-medium' : 'text-gray-700' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Activo
                                        </span>
                                        </label>
                                        <label class="relative cursor-pointer border rounded-md px-3 py-2 flex items-center justify-center
                                                {{ old('estado', $mascota->estado) == 'Inactivo' ? 'bg-yellow-50 border-yellow-500 ring-2 ring-yellow-200' : 'bg-white border-gray-300' }}"
                                               for="estado-inactivo">
                                            <input type="radio" id="estado-inactivo" name="estado" value="Inactivo"
                                                   class="sr-only" {{ old('estado', $mascota->estado) == 'Inactivo' ? 'checked' : '' }}>
                                            <span class="flex items-center justify-center text-sm {{ old('estado', $mascota->estado) == 'Inactivo' ? 'text-yellow-700 font-medium' : 'text-gray-700' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            Inactivo
                                        </span>
                                        </label>
                                        <label class="relative cursor-pointer border rounded-md px-3 py-2 flex items-center justify-center
                                                {{ old('estado', $mascota->estado) == 'Fallecido' ? 'bg-red-50 border-red-500 ring-2 ring-red-200' : 'bg-white border-gray-300' }}"
                                               for="estado-fallecido">
                                            <input type="radio" id="estado-fallecido" name="estado" value="Fallecido"
                                                   class="sr-only" {{ old('estado', $mascota->estado) == 'Fallecido' ? 'checked' : '' }}>
                                            <span class="flex items-center justify-center text-sm {{ old('estado', $mascota->estado) == 'Fallecido' ? 'text-red-700 font-medium' : 'text-gray-700' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Fallecido
                                        </span>
                                        </label>
                                    </div>
                                    @error('estado')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Esterilizado -->
                                <div class="mt-6">
                                    <label class="flex items-center cursor-pointer">
                                        <div class="relative inline-block align-middle">
                                            <input type="checkbox" name="esterilizado" id="esterilizado" value="1"
                                                   {{ old('esterilizado', $mascota->esterilizado) ? 'checked' : '' }}
                                                   class="hidden peer">
                                            <div class="w-10 h-6 bg-gray-200 rounded-full shadow-inner peer-checked:bg-indigo-500 transition"></div>
                                            <div class="absolute w-4 h-4 bg-white rounded-full shadow left-1 top-1 peer-checked:left-5 transition-all"></div>
                                        </div>
                                        <span class="font-medium text-gray-700 ml-3">Esterilizado/a</span>
                                    </label>
                                </div>

                                <div class="border-t border-gray-200 pt-4 mt-4">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('paciente.mascotas.show', $mascota) }}"
                                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Cancelar
                                        </a>
                                        <button type="submit"
                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Guardar cambios
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Columna 2-3: Información principal -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                            <div class="px-6 py-4 bg-gradient-to-r from-indigo-500 to-purple-500">
                                <h2 class="text-lg font-bold text-white">Información básica</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Nombre -->
                                    <div>
                                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre <span class="text-red-500">*</span></label>
                                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $mascota->nombre) }}"
                                               class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                 border-gray-300 rounded-lg px-3 py-2.5 @error('nombre') border-red-500 @enderror" required>
                                        @error('nombre')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Especie -->
                                    <div class="relative">
                                        <label for="especie" class="block text-sm font-medium text-gray-700 mb-1">Especie <span class="text-red-500">*</span></label>
                                        <select name="especie" id="especie"
                                                class="appearance-none block w-full px-3 py-2.5 border border-gray-300 rounded-lg shadow-sm
                                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                                  @error('especie') border-red-500 @enderror" required>
                                            <option value="">Seleccione la especie</option>
                                            <option value="Perro" {{ old('especie', $mascota->especie) == 'Perro' ? 'selected' : '' }}>Perro</option>
                                            <option value="Gato" {{ old('especie', $mascota->especie) == 'Gato' ? 'selected' : '' }}>Gato</option>
                                            <option value="Ave" {{ old('especie', $mascota->especie) == 'Ave' ? 'selected' : '' }}>Ave</option>
                                            <option value="Roedor" {{ old('especie', $mascota->especie) == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                                            <option value="Reptil" {{ old('especie', $mascota->especie) == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                                            <option value="Otro" {{ old('especie', $mascota->especie) == 'Otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 pt-6">
                                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        @error('especie')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Raza -->
                                    <div>
                                        <label for="raza" class="block text-sm font-medium text-gray-700 mb-1">Raza</label>
                                        <input type="text" name="raza" id="raza" value="{{ old('raza', $mascota->raza) }}"
                                               class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                 border-gray-300 rounded-lg px-3 py-2.5 @error('raza') border-red-500 @enderror">
                                        @error('raza')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Color -->
                                    <div>
                                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                        <div class="flex">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                            </svg>
                                        </span>
                                            <input type="text" name="color" id="color" value="{{ old('color', $mascota->color) }}"
                                                   class="flex-1 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 sm:text-sm
                                                     border-gray-300 rounded-r-lg px-3 py-2.5 @error('color') border-red-500 @enderror">
                                        </div>
                                        @error('color')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Sexo -->
                                    <div>
                                        <label for="sexo" class="block text-sm font-medium text-gray-700 mb-1">Sexo</label>
                                        <div class="flex space-x-3">
                                            <label class="relative cursor-pointer border rounded-md px-3 py-2 flex items-center justify-center flex-1
                                                    {{ old('sexo', $mascota->sexo) == 'Macho' ? 'bg-blue-50 border-blue-500 ring-2 ring-blue-200' : 'bg-white border-gray-300' }}"
                                                   for="sexo-macho">
                                                <input type="radio" id="sexo-macho" name="sexo" value="Macho"
                                                       class="sr-only" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'checked' : '' }}>
                                                <span class="flex items-center justify-center text-sm {{ old('sexo', $mascota->sexo) == 'Macho' ? 'text-blue-700 font-medium' : 'text-gray-700' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Macho
                                            </span>
                                            </label>
                                            <label class="relative cursor-pointer border rounded-md px-3 py-2 flex items-center justify-center flex-1
                                                    {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'bg-pink-50 border-pink-500 ring-2 ring-pink-200' : 'bg-white border-gray-300' }}"
                                                   for="sexo-hembra">
                                                <input type="radio" id="sexo-hembra" name="sexo" value="Hembra"
                                                       class="sr-only" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'checked' : '' }}>
                                                <span class="flex items-center justify-center text-sm {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'text-pink-700 font-medium' : 'text-gray-700' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Hembra
                                            </span>
                                            </label>
                                        </div>
                                        @error('sexo')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Fecha de nacimiento -->
                                    <div>
                                        <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de nacimiento</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                                                   value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento ? \Carbon\Carbon::parse($mascota->fecha_nacimiento)->format('Y-m-d') : '') }}"
                                                   class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm
                                                     border-gray-300 rounded-lg px-3 py-2.5 @error('fecha_nacimiento') border-red-500 @enderror">
                                        </div>
                                        @error('fecha_nacimiento')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Peso -->
                                    <div>
                                        <label for="peso" class="block text-sm font-medium text-gray-700 mb-1">Peso (kg)</label>
                                        <div class="relative rounded-lg shadow-sm">
                                            <input type="number" name="peso" id="peso" value="{{ old('peso', $mascota->peso) }}"
                                                   step="0.01" min="0.1" max="999.99"
                                                   class="focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm
                                                     border-gray-300 rounded-lg px-3 py-2.5 @error('peso') border-red-500 @enderror">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <span class="text-gray-500 sm:text-sm">kg</span>
                                            </div>
                                        </div>
                                        @error('peso')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-green-500 to-teal-500">
                                <h2 class="text-lg font-bold text-white">Información médica</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Características especiales -->
                                    <div>
                                        <label for="caracteristicas_especiales" class="block text-sm font-medium text-gray-700 mb-1">Características especiales</label>
                                        <textarea name="caracteristicas_especiales" id="caracteristicas_especiales" rows="3"
                                                  class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                   border-gray-300 rounded-lg px-3 py-2.5 @error('caracteristicas_especiales') border-red-500 @enderror"
                                                  placeholder="Señas particulares, marcas distintivas, etc.">{{ old('caracteristicas_especiales', $mascota->caracteristicas_especiales) }}</textarea>
                                        @error('caracteristicas_especiales')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Alergias -->
                                    <div>
                                        <label for="alergias" class="block text-sm font-medium text-gray-700 mb-1">Alergias</label>
                                        <textarea name="alergias" id="alergias" rows="3"
                                                  class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                   border-gray-300 rounded-lg px-3 py-2.5 @error('alergias') border-red-500 @enderror"
                                                  placeholder="Alimentos, medicamentos, etc.">{{ old('alergias', $mascota->alergias) }}</textarea>
                                        @error('alergias')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Condiciones médicas -->
                                    <div>
                                        <label for="condiciones_medicas" class="block text-sm font-medium text-gray-700 mb-1">Condiciones médicas</label>
                                        <textarea name="condiciones_medicas" id="condiciones_medicas" rows="3"
                                                  class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                   border-gray-300 rounded-lg px-3 py-2.5 @error('condiciones_medicas') border-red-500 @enderror"
                                                  placeholder="Enfermedades crónicas, condiciones diagnosticadas, etc.">{{ old('condiciones_medicas', $mascota->condiciones_medicas) }}</textarea>
                                        @error('condiciones_medicas')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Medicación actual -->
                                    <div>
                                        <label for="medicacion_actual" class="block text-sm font-medium text-gray-700 mb-1">Medicación actual</label>
                                        <textarea name="medicacion_actual" id="medicacion_actual" rows="3"
                                                  class="shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                   border-gray-300 rounded-lg px-3 py-2.5 @error('medicacion_actual') border-red-500 @enderror"
                                                  placeholder="Medicamentos, suplementos, dosis, frecuencia, etc.">{{ old('medicacion_actual', $mascota->medicacion_actual) }}</textarea>
                                        @error('medicacion_actual')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para previsualizar la imagen
        function previewImage(event) {
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const file = event.target.files[0];

            if (file) {
                preview.classList.remove('hidden');
                const reader = new FileReader();
                reader.onload = function() {
                    previewImg.src = reader.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Funciones para el manejo de los estados con radio buttons
            document.querySelectorAll('input[name="estado"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Primero, restablecer todos los radio buttons a su estado normal
                    document.querySelectorAll('label[for^="estado-"]').forEach(label => {
                        label.classList.remove('bg-green-50', 'border-green-500', 'ring-2', 'ring-green-200',
                            'bg-yellow-50', 'border-yellow-500', 'ring-2', 'ring-yellow-200',
                            'bg-red-50', 'border-red-500', 'ring-2', 'ring-red-200');
                        label.classList.add('bg-white', 'border-gray-300');

                        // Restablecer el estilo del texto
                        const span = label.querySelector('span');
                        if (span) {
                            span.classList.remove('text-green-700', 'text-yellow-700', 'text-red-700', 'font-medium');
                            span.classList.add('text-gray-700');
                        }
                    });

                    // Aplicar estilo al radio button seleccionado
                    const label = document.querySelector(`label[for="estado-${this.value.toLowerCase()}"]`);
                    if (label) {
                        label.classList.remove('bg-white', 'border-gray-300');

                        const span = label.querySelector('span');
                        if (span) {
                            span.classList.remove('text-gray-700');
                            span.classList.add('font-medium');
                        }

                        if (this.value === 'Activo') {
                            label.classList.add('bg-green-50', 'border-green-500', 'ring-2', 'ring-green-200');
                            if (span) span.classList.add('text-green-700');
                        } else if (this.value === 'Inactivo') {
                            label.classList.add('bg-yellow-50', 'border-yellow-500', 'ring-2', 'ring-yellow-200');
                            if (span) span.classList.add('text-yellow-700');
                        } else if (this.value === 'Fallecido') {
                            label.classList.add('bg-red-50', 'border-red-500', 'ring-2', 'ring-red-200');
                            if (span) span.classList.add('text-red-700');
                        }
                    }
                });
            });

            // Manejar radio de sexo
            document.querySelectorAll('input[name="sexo"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Resetear estilos
                    document.querySelectorAll('label[for^="sexo-"]').forEach(label => {
                        label.classList.remove('bg-blue-50', 'border-blue-500', 'ring-2', 'ring-blue-200',
                            'bg-pink-50', 'border-pink-500', 'ring-2', 'ring-pink-200');
                        label.classList.add('bg-white', 'border-gray-300');

                        const span = label.querySelector('span');
                        if (span) {
                            span.classList.remove('text-blue-700', 'text-pink-700', 'font-medium');
                            span.classList.add('text-gray-700');
                        }
                    });

                    // Aplicar estilo al seleccionado
                    const label = document.querySelector(`label[for="sexo-${this.value.toLowerCase()}"]`);
                    if (label) {
                        label.classList.remove('bg-white', 'border-gray-300');

                        const span = label.querySelector('span');
                        if (span) {
                            span.classList.remove('text-gray-700');
                            span.classList.add('font-medium');
                        }

                        if (this.value === 'Macho') {
                            label.classList.add('bg-blue-50', 'border-blue-500', 'ring-2', 'ring-blue-200');
                            if (span) span.classList.add('text-blue-700');
                        } else if (this.value === 'Hembra') {
                            label.classList.add('bg-pink-50', 'border-pink-500', 'ring-2', 'ring-pink-200');
                            if (span) span.classList.add('text-pink-700');
                        }
                    }
                });
            });
        });
    </script>
@endsection
