@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8 flex justify-center items-center">
        <div class="max-w-5xl w-full">
            <!-- Encabezado con efecto de neomorfismo -->
            <div class="relative mb-8">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-indigo-600 transform rotate-1 rounded-xl shadow-lg opacity-70"></div>
                <div class="relative bg-white rounded-xl shadow-xl p-6 backdrop-filter backdrop-blur-sm bg-opacity-90 border border-gray-100">
                    <h1 class="font-extrabold text-transparent text-3xl bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 mr-3 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905a3.61 3.61 0 01-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                        Registro de Mascota
                    </h1>
                    <p class="mt-2 text-gray-600 max-w-2xl">Completa los datos para registrar una nueva mascota en nuestro sistema veterinario. Los campos marcados con * son obligatorios.</p>
                </div>
            </div>

            <!-- Indicador de progreso -->
            <div class="relative mb-10 hidden md:block">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="tab-indicator bg-gradient-to-r from-purple-500 to-indigo-500 h-2 rounded-full transition-all duration-500"></div>
                </div>
                <div class="flex justify-between text-sm font-medium text-gray-600 mt-2">
                    <div class="tab-label active" data-tab="informacion-basica">Información básica</div>
                    <div class="tab-label" data-tab="caracteristicas">Características</div>
                    <div class="tab-label" data-tab="info-medica">Información médica</div>
                    <div class="tab-label" data-tab="media">Multimedia</div>
                </div>
            </div>

            <!-- Formulario con pestañas -->
            <form action="{{ route('admin.mascotas.store') }}" method="POST" enctype="multipart/form-data" id="mascota-form">
                @csrf

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Tabs de navegación móvil -->
                    <div class="md:hidden flex overflow-x-auto py-3 px-4 space-x-4 border-b border-gray-200">
                        <button type="button" class="px-3 py-1.5 text-sm font-medium rounded-full bg-indigo-100 text-indigo-700 whitespace-nowrap tab-button active" data-tab="informacion-basica">Básica</button>
                        <button type="button" class="px-3 py-1.5 text-sm font-medium rounded-full bg-gray-100 text-gray-700 whitespace-nowrap tab-button" data-tab="caracteristicas">Características</button>
                        <button type="button" class="px-3 py-1.5 text-sm font-medium rounded-full bg-gray-100 text-gray-700 whitespace-nowrap tab-button" data-tab="info-medica">Médica</button>
                        <button type="button" class="px-3 py-1.5 text-sm font-medium rounded-full bg-gray-100 text-gray-700 whitespace-nowrap tab-button" data-tab="media">Multimedia</button>
                    </div>

                    <!-- Paneles de contenido -->
                    <div class="tab-content">
                        <!-- Tab 1: Información básica -->
                        <div class="p-6 tab-pane active" id="informacion-basica">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Selector de dueño con búsqueda -->
                                <div class="col-span-2 md:col-span-1">
                                    <label for="paciente_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Dueño <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select name="paciente_id" id="paciente_id"
                                                class="appearance-none block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm pl-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('paciente_id') border-red-500 @enderror"
                                                required>
                                            <option value="">Seleccione un paciente</option>
                                            @foreach($pacientes as $paciente)
                                                <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                                    {{ $paciente->apellidos }} {{ $paciente->nombres }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    @error('paciente_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nombre de la mascota -->
                                <div class="col-span-2 md:col-span-1">
                                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nombre de la mascota <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Firulais"
                                               class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm pl-10 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('nombre') border-red-500 @enderror"
                                               required>
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9.707 7.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 9.586V3a1 1 0 10-2 0v6.586l-1.293-1.293zM11 12a1 1 0 10-2 0v4a1 1 0 102 0v-4z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    @error('nombre')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tipo de mascota con imágenes reales -->
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-3">
                                        Especie <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 justify-center">
                                        <label class="cursor-pointer">
                                            <input type="radio" name="especie" value="Perro" class="sr-only peer" {{ old('especie') == 'Perro' ? 'checked' : '' }} required>
                                            <div class="flex flex-col items-center rounded-xl text-gray-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-600 peer-checked:border-indigo-200 border-2 border-gray-200 hover:border-gray-300 transition-all overflow-hidden h-44">
                                                <div class="w-full h-32 overflow-hidden">
                                                    <svg class="w-full h-full object-cover" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Fondo del círculo -->
                                                        <rect width="200" height="200" fill="#F5F7FF"/>
                                                        <path d="M100 150C127.614 150 150 127.614 150 100C150 72.3858 127.614 50 100 50C72.3858 50 50 72.3858 50 100C50 127.614 72.3858 150 100 150Z" fill="#E6E9F5"/>

                                                        <!-- Imagen del perro dentro del círculo -->
                                                        <foreignObject x="40" y="50" width="120" height="120">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/7280/7280886.png" alt="Perro" class="w-full h-full object-cover" />
                                                        </foreignObject>
                                                    </svg>
                                                </div>
                                                <div class="bg-white w-full p-2 flex items-center justify-center border-t">
                                                    <span class="font-medium text-center">Perro</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="especie" value="Gato" class="sr-only peer" {{ old('especie') == 'Gato' ? 'checked' : '' }}>
                                            <div class="flex flex-col items-center rounded-xl text-gray-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-600 peer-checked:border-indigo-200 border-2 border-gray-200 hover:border-gray-300 transition-all overflow-hidden h-44">
                                                <div class="w-full h-32 overflow-hidden">
                                                    <svg class="w-full h-full object-cover" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Fondo del círculo -->
                                                        <rect width="200" height="200" fill="#F5F7FF"/>
                                                        <path d="M100 150C127.614 150 150 127.614 150 100C150 72.3858 127.614 50 100 50C72.3858 50 50 72.3858 50 100C50 127.614 72.3858 150 100 150Z" fill="#E6E9F5"/>

                                                        <!-- Imagen del gato dentro del círculo -->
                                                        <foreignObject x="30" y="40" width="140" height="140">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/8036/8036693.png" alt="Gato" class="w-full h-full object-cover" />
                                                        </foreignObject>
                                                    </svg>
                                                </div>
                                                <div class="bg-white w-full p-2 flex items-center justify-center border-t">
                                                    <span class="font-medium text-center">Gato</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="especie" value="Ave" class="sr-only peer" {{ old('especie') == 'Ave' ? 'checked' : '' }}>
                                            <div class="flex flex-col items-center rounded-xl text-gray-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-600 peer-checked:border-indigo-200 border-2 border-gray-200 hover:border-gray-300 transition-all overflow-hidden h-44">
                                                <div class="w-full h-32 overflow-hidden">
                                                    <svg class="w-full h-full object-cover" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Fondo del círculo -->
                                                        <rect width="200" height="200" fill="#F5F7FF"/>


                                                        <!-- Imagen del ave dentro del círculo -->
                                                        <foreignObject x="50" y="30" width="100" height="100">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/7743/7743231.png" alt="Ave" class="w-full h-full object-cover" />
                                                        </foreignObject>
                                                    </svg>
                                                </div>
                                                <div class="bg-white w-full p-2 flex items-center justify-center border-t">
                                                    <span class="font-medium text-center">Ave</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="especie" value="Conejo" class="sr-only peer" {{ old('especie') == 'Conejo' ? 'checked' : '' }}>
                                            <div class="flex flex-col items-center rounded-xl text-gray-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-600 peer-checked:border-indigo-200 border-2 border-gray-200 hover:border-gray-300 transition-all overflow-hidden h-44">
                                                <div class="w-full h-32 overflow-hidden">
                                                    <svg class="w-full h-full object-cover" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Fondo del círculo -->
                                                        <rect width="200" height="200" fill="#F5F7FF"/>


                                                        <!-- Imagen del conejo dentro del círculo -->
                                                        <foreignObject x="35" y="50" width="130" height="130">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/2545/2545715.png" alt="Conejo" class="w-full h-full object-cover" />
                                                        </foreignObject>
                                                    </svg>
                                                </div>
                                                <div class="bg-white w-full p-2 flex items-center justify-center border-t">
                                                    <span class="font-medium text-center">Conejo</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="especie" value="Otro" class="sr-only peer" {{ old('especie') == 'Otro' ? 'checked' : '' }}>
                                            <div class="flex flex-col items-center rounded-xl text-gray-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-600 peer-checked:border-indigo-200 border-2 border-gray-200 hover:border-gray-300 transition-all overflow-hidden h-44">
                                                <div class="w-full h-32 overflow-hidden">
                                                    <svg class="w-full h-full object-cover" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <!-- Fondo del círculo -->
                                                        <rect width="200" height="200" fill="#F5F7FF"/>
                                                        <path d="M100 150C127.614 150 150 127.614 150 100C150 72.3858 127.614 50 100 50C72.3858 50 50 72.3858 50 100C50 127.614 72.3858 150 100 150Z" fill="#E6E9F5"/>

                                                        <!-- Imagen de "Otro" dentro del círculo -->
                                                        <foreignObject x="50" y="50" width="100" height="100">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/614/614140.png" alt="Otro" class="w-full h-full object-cover" />
                                                        </foreignObject>
                                                    </svg>
                                                </div>
                                                <div class="bg-white w-full p-2 flex items-center justify-center border-t">
                                                    <span class="font-medium text-center">Otro</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    @error('especie')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2 md:col-span-1">
                                    <label for="raza" class="block text-sm font-medium text-gray-700 mb-1">Raza</label>
                                    <input type="text" id="raza" name="raza" value="{{ old('raza') }}" placeholder="Ej. Golden Retriever"
                                           class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('raza') border-red-500 @enderror">
                                    @error('raza')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Estado con badge de colores -->
                                <div class="col-span-2 md:col-span-1">
                                    <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">
                                        Estado <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select name="estado" id="estado"
                                                class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('estado') border-red-500 @enderror"
                                                required>
                                            <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }} data-color="bg-green-100 text-green-800">Activo</option>
                                            <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }} data-color="bg-yellow-100 text-yellow-800">Inactivo</option>
                                            <option value="Fallecido" {{ old('estado') == 'Fallecido' ? 'selected' : '' }} data-color="bg-gray-100 text-gray-800">Fallecido</option>
                                        </select>
                                        <div id="estado-badge" class="absolute right-10 top-1/2 transform -translate-y-1/2 px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                            Activo
                                        </div>
                                    </div>
                                    @error('estado')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2 flex justify-end">
                                    <button type="button" class="btn-next px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md transition-all flex items-center" data-next-tab="caracteristicas">
                                        Siguiente
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 2: Características -->
                        <div class="p-6 tab-pane hidden" id="caracteristicas">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Selector de color con paleta -->
                                <div>
                                    <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                    <div class="relative">
                                        <input type="text" id="color" name="color" value="{{ old('color') }}" placeholder="Ej. Marrón"
                                               class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('color') border-red-500 @enderror">
                                    </div>
                                    <div class="flex mt-2 space-x-2">
                                        <button type="button" class="color-selector w-6 h-6 rounded-full bg-black border border-gray-300 focus:outline-none focus:ring-2" data-color="Negro"></button>
                                        <button type="button" class="color-selector w-6 h-6 rounded-full bg-white border border-gray-300 focus:outline-none focus:ring-2" data-color="Blanco"></button>
                                        <button type="button" class="color-selector w-6 h-6 rounded-full bg-gray-500 border border-gray-300 focus:outline-none focus:ring-2" data-color="Gris"></button>
                                        <button type="button" class="color-selector w-6 h-6 rounded-full bg-amber-700 border border-gray-300 focus:outline-none focus:ring-2" data-color="Marrón"></button>
                                        <button type="button" class="color-selector w-6 h-6 rounded-full bg-amber-300 border border-gray-300 focus:outline-none focus:ring-2" data-color="Crema"></button>
                                        <button type="button" class="color-selector w-6 h-6 rounded-full bg-gradient-to-r from-black via-white to-amber-700 border border-gray-300 focus:outline-none focus:ring-2" data-color="Tricolor"></button>
                                    </div>
                                    @error('color')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Selector de sexo con switch -->
                                <div>
                                    <label for="sexo" class="block text-sm font-medium text-gray-700 mb-3">Sexo</label>
                                    <div class="flex space-x-4">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="radio" name="sexo" value="Macho" class="sr-only peer" {{ old('sexo') == 'Macho' ? 'checked' : '' }}>
                                            <div class="flex items-center px-4 py-2 rounded-lg peer-checked:bg-blue-100 peer-checked:text-blue-700 peer-checked:border-blue-300 border-2 border-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="10" cy="14" r="5"></circle>
                                                    <path d="M19 5l-4.5 4.5"></path>
                                                    <path d="M15 5h4v4"></path>
                                                </svg>
                                                <span class="font-medium">Macho</span>
                                            </div>
                                        </label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="radio" name="sexo" value="Hembra" class="sr-only peer" {{ old('sexo') == 'Hembra' ? 'checked' : '' }}>
                                            <div class="flex items-center px-4 py-2 rounded-lg peer-checked:bg-pink-100 peer-checked:text-pink-700 peer-checked:border-pink-300 border-2 border-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="10" r="5"></circle>
                                                    <path d="M12 15v6"></path>
                                                    <path d="M9 18h6"></path>
                                                </svg>
                                                <span class="font-medium">Hembra</span>
                                            </div>
                                        </label>
                                    </div>
                                    @error('sexo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Fecha de nacimiento con edad automática -->
                                <div>
                                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
                                    <div class="relative">
                                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                               class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('fecha_nacimiento') border-red-500 @enderror">
                                        <div id="edad-calculada" class="mt-1 text-sm text-indigo-600 font-medium hidden">
                                            Edad: <span id="edad-valor"></span>
                                        </div>
                                    </div>
                                    @error('fecha_nacimiento')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Peso con slider -->
                                <div>
                                    <label for="peso" class="block text-sm font-medium text-gray-700 mb-1">Peso (kg)</label>
                                    <div class="relative mt-3">
                                        <input type="range" min="0" max="100" step="0.1" id="peso_slider" value="{{ old('peso') ?: '0' }}"
                                               class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-indigo-600">
                                        <input type="number" step="0.01" id="peso" name="peso" value="{{ old('peso') }}"
                                               class="mt-3 block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('peso') border-red-500 @enderror">
                                    </div>
                                    @error('peso')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Microchip con toggle -->
                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <label for="microchip" class="block text-sm font-medium text-gray-700">Número de Microchip</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" id="has_microchip">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                            <span class="ml-2 text-sm font-medium text-gray-700">Tiene microchip</span>
                                        </label>
                                    </div>
                                    <input type="text" id="microchip" name="microchip" value="{{ old('microchip') }}" placeholder="Ej. 939000001234567"
                                           class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('microchip') border-red-500 @enderror" {{ old('microchip') ? '' : 'disabled' }}>
                                    @error('microchip')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Switch castrado -->
                                <div>
                                    <label class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-700">Esterilizado/Castrado</span>
                                        <div class="relative inline-block w-14 align-middle select-none transition duration-200 ease-in">
                                            <input type="checkbox" name="esterilizado" id="esterilizado" value="1" {{ old('esterilizado') ? 'checked' : '' }}
                                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-gray-300 appearance-none cursor-pointer checked:right-0 checked:border-indigo-600 focus:outline-none">
                                            <label for="esterilizado" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-span-2 flex justify-between">
                                    <button type="button" class="btn-prev px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 shadow-md transition-all flex items-center" data-prev-tab="informacion-basica">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Anterior
                                    </button>
                                    <button type="button" class="btn-next px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md transition-all flex items-center" data-next-tab="info-medica">
                                        Siguiente
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 3: Información médica -->
                        <div class="p-6 tab-pane hidden" id="info-medica">
                            <div class="space-y-6">
                                <!-- Tarjetas de información médica -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label for="caracteristicas_especiales" class="block text-sm font-medium text-gray-700 mb-1 group-focus-within:text-indigo-700 transition-colors">Características Especiales</label>
                                        <div class="relative">
                                        <textarea id="caracteristicas_especiales" name="caracteristicas_especiales" rows="3" placeholder="Marcas de nacimiento, cicatrices, etc."
                                                  class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('caracteristicas_especiales') border-red-500 @enderror">{{ old('caracteristicas_especiales') }}</textarea>
                                            <div class="absolute top-2 right-2 text-gray-400 group-focus-within:text-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('caracteristicas_especiales')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="group">
                                        <label for="alergias" class="block text-sm font-medium text-gray-700 mb-1 group-focus-within:text-indigo-700 transition-colors">Alergias Conocidas</label>
                                        <div class="relative">
                                        <textarea id="alergias" name="alergias" rows="3" placeholder="Alergias a medicamentos, alimentos, etc."
                                                  class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('alergias') border-red-500 @enderror">{{ old('alergias') }}</textarea>
                                            <div class="absolute top-2 right-2 text-gray-400 group-focus-within:text-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('alergias')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label for="condiciones_medicas" class="block text-sm font-medium text-gray-700 mb-1 group-focus-within:text-indigo-700 transition-colors">Condiciones Médicas</label>
                                        <div class="relative">
                                        <textarea id="condiciones_medicas" name="condiciones_medicas" rows="3" placeholder="Enfermedades crónicas, condiciones previas, etc."
                                                  class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('condiciones_medicas') border-red-500 @enderror">{{ old('condiciones_medicas') }}</textarea>
                                            <div class="absolute top-2 right-2 text-gray-400 group-focus-within:text-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('condiciones_medicas')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="group">
                                        <label for="medicacion_actual" class="block text-sm font-medium text-gray-700 mb-1 group-focus-within:text-indigo-700 transition-colors">Medicación Actual</label>
                                        <div class="relative">
                                        <textarea id="medicacion_actual" name="medicacion_actual" rows="3" placeholder="Medicamentos que toma actualmente, dosis, etc."
                                                  class="block w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('medicacion_actual') border-red-500 @enderror">{{ old('medicacion_actual') }}</textarea>
                                            <div class="absolute top-2 right-2 text-gray-400 group-focus-within:text-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('medicacion_actual')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <button type="button" class="btn-prev px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 shadow-md transition-all flex items-center" data-prev-tab="caracteristicas">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Anterior
                                    </button>
                                    <button type="button" class="btn-next px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md transition-all flex items-center" data-next-tab="media">
                                        Siguiente
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 4: Multimedia -->
                        <div class="p-6 tab-pane hidden" id="media">
                            <div class="space-y-6">
                                <div class="flex flex-col items-center">
                                    <div class="relative w-full h-64 rounded-lg bg-gray-50 border-2 border-dashed border-gray-300 flex justify-center items-center overflow-hidden group hover:border-indigo-500 transition-colors">
                                        <input type="file" class="absolute inset-0 opacity-0 cursor-pointer z-10" id="foto" name="foto">
                                        <div class="text-center p-4" id="upload-prompt">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400 group-hover:text-indigo-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <h4 class="text-sm font-medium text-gray-700 group-hover:text-indigo-600 mt-2 transition-colors">
                                                Arrastra una foto o haz clic para seleccionar
                                            </h4>
                                            <p class="mt-1 text-xs text-gray-500">
                                                Formatos permitidos: JPG, PNG. Máximo 2MB.
                                            </p>
                                        </div>
                                        <img id="foto-preview" class="absolute inset-0 w-full h-full object-cover hidden">
                                        <button type="button" id="remove-image" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hidden hover:bg-red-600 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('foto')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Botones de acción final -->
                                <div class="flex justify-between pt-6">
                                    <button type="button" class="btn-prev px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 shadow-md transition-all flex items-center" data-prev-tab="info-medica">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Anterior
                                    </button>
                                    <div class="space-x-3">
                                        <a href="{{ route('admin.mascotas.index') }}"
                                           class="px-5 py-2.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 shadow-md transition-all inline-flex items-center">
                                            Cancelar
                                        </a>
                                        <button type="submit"
                                                class="px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-lg transition-all inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            Guardar Mascota
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Estilos para el toggle switch */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #6366f1;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #6366f1;
        }
        .toggle-label {
            transition: background-color 0.3s ease;
        }

        /* Animaciones para las pestañas */
        .tab-pane {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .tab-pane.active {
            opacity: 1;
            transform: translateX(0);
        }
        .tab-pane.hidden {
            opacity: 0;
            transform: translateX(20px);
            display: none;
        }

        /* Estilos para la selección de color */
        .color-selector:focus {
            outline: none;
            box-shadow: 0 0 0 2px #6366f1;
        }

        /* Estilo para label activo */
        .tab-label.active {
            color: #4f46e5;
            font-weight: 600;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejo de tabs
            const tabs = ['informacion-basica', 'caracteristicas', 'info-medica', 'media'];
            const tabButtons = document.querySelectorAll('.tab-button');
            const nextButtons = document.querySelectorAll('.btn-next');
            const prevButtons = document.querySelectorAll('.btn-prev');
            const tabLabels = document.querySelectorAll('.tab-label');
            const tabIndicator = document.querySelector('.tab-indicator');

            function setActiveTab(tabId) {
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.add('hidden');
                    pane.classList.remove('active');
                });

                document.getElementById(tabId).classList.remove('hidden');
                setTimeout(() => {
                    document.getElementById(tabId).classList.add('active');
                }, 10);

                tabButtons.forEach(btn => {
                    if (btn.dataset.tab === tabId) {
                        btn.classList.add('bg-indigo-100', 'text-indigo-700');
                        btn.classList.remove('bg-gray-100', 'text-gray-700');
                    } else {
                        btn.classList.remove('bg-indigo-100', 'text-indigo-700');
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    }
                });

                tabLabels.forEach(label => {
                    if (label.dataset.tab === tabId) {
                        label.classList.add('active');
                    } else {
                        label.classList.remove('active');
                    }
                });

                // Update progress indicator
                const index = tabs.indexOf(tabId);
                const width = (index / (tabs.length - 1)) * 100;
                tabIndicator.style.width = `${width}%`;
            }

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    setActiveTab(btn.dataset.tab);
                });
            });

            tabLabels.forEach(label => {
                label.addEventListener('click', () => {
                    setActiveTab(label.dataset.tab);
                });
            });

            nextButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    setActiveTab(btn.dataset.nextTab);
                });
            });

            prevButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    setActiveTab(btn.dataset.prevTab);
                });
            });

            // Manejo del color picker
            const colorSelector = document.querySelectorAll('.color-selector');
            const colorInput = document.getElementById('color');

            colorSelector.forEach(btn => {
                btn.addEventListener('click', () => {
                    colorInput.value = btn.dataset.color;
                });
            });

            // Vista previa de la imagen
            const imageInput = document.getElementById('foto');
            const imagePreview = document.getElementById('foto-preview');
            const uploadPrompt = document.getElementById('upload-prompt');
            const removeButton = document.getElementById('remove-image');

            imageInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        uploadPrompt.classList.add('hidden');
                        removeButton.classList.remove('hidden');
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            removeButton.addEventListener('click', function() {
                imageInput.value = '';
                imagePreview.src = '';
                imagePreview.classList.add('hidden');
                uploadPrompt.classList.remove('hidden');
                removeButton.classList.add('hidden');
            });

            // Estado con badge colorizado
            const estadoSelect = document.getElementById('estado');
            const estadoBadge = document.getElementById('estado-badge');

            function updateEstadoBadge() {
                const selectedOption = estadoSelect.options[estadoSelect.selectedIndex];
                const colorClass = selectedOption.dataset.color || 'bg-green-100 text-green-800';

                // Remove all possible color classes
                estadoBadge.className = 'absolute right-10 top-1/2 transform -translate-y-1/2 px-2 py-0.5 text-xs font-medium rounded-full';

                // Add selected color class
                estadoBadge.classList.add(...colorClass.split(' '));

                // Set text
                estadoBadge.textContent = selectedOption.text;
            }

            estadoSelect.addEventListener('change', updateEstadoBadge);
            updateEstadoBadge();

            // Toggle microchip field
            const hasMicrochip = document.getElementById('has_microchip');
            const microchipField = document.getElementById('microchip');

            hasMicrochip.addEventListener('change', function() {
                microchipField.disabled = !this.checked;
                if (!this.checked) {
                    microchipField.value = '';
                }
            });

            // Initialize based on existing value
            if (microchipField.value) {
                hasMicrochip.checked = true;
                microchipField.disabled = false;
            }

            // Calculadora de edad
            const fechaNacimiento = document.getElementById('fecha_nacimiento');
            const edadCalculada = document.getElementById('edad-calculada');
            const edadValor = document.getElementById('edad-valor');

            fechaNacimiento.addEventListener('change', function() {
                if (this.value) {
                    const birthDate = new Date(this.value);
                    const today = new Date();

                    let years = today.getFullYear() - birthDate.getFullYear();
                    let months = today.getMonth() - birthDate.getMonth();

                    if (months < 0 || (months === 0 && today.getDate() < birthDate.getDate())) {
                        years--;
                        months += 12;
                    }

                    let ageText = '';
                    if (years > 0) {
                        ageText += years + (years === 1 ? ' año ' : ' años ');
                    }
                    if (months > 0 || years === 0) {
                        ageText += months + (months === 1 ? ' mes' : ' meses');
                    }

                    edadValor.textContent = ageText;
                    edadCalculada.classList.remove('hidden');
                } else {
                    edadCalculada.classList.add('hidden');
                }
            });

            // Trigger change if date already has a value
            if (fechaNacimiento.value) {
                fechaNacimiento.dispatchEvent(new Event('change'));
            }

            // Enlazar slider con input de peso
            const pesoSlider = document.getElementById('peso_slider');
            const pesoInput = document.getElementById('peso');

            pesoSlider.addEventListener('input', function() {
                pesoInput.value = this.value;
            });

            pesoInput.addEventListener('input', function() {
                pesoSlider.value = this.value;
            });
        });
    </script>
@endsection
