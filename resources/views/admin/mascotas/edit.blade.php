@extends('layouts.admin')

@section('content')
    <div class="bg-gradient-to-br from-indigo-50 via-blue-50 to-purple-50 min-h-screen pb-20">

        @if(session('mensaje'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "{{ session('icono') === 'success' ? '¡Éxito!' : '¡Error!' }}",
                        text: "{{ session('mensaje') }}",
                        icon: "{{ session('icono') }}",
                        showConfirmButton: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: "{{ session('icono') === 'success' ? '#10b981' : '#f43f5e' }}",
                        customClass: {
                            popup: 'rounded-xl shadow-xl backdrop-blur-sm animate__animated animate__fadeIn',
                            title: "{{ session('icono') === 'success' ? 'text-emerald-700' : 'text-rose-700' }}",
                            confirmButton: 'transition-all duration-300 ease-in-out hover:scale-105'
                        },
                        background: "{{ session('icono') === 'success' ? '#ecfdf5' : '#fff1f2' }}",
                        timer: 3000,
                        timerProgressBar: true,
                        toast: false,
                        position: 'center',
                        allowOutsideClick: true,
                        backdrop: `rgba(0,0,0,0.4)`,
                        showClass: {
                            popup: 'animate__animated animate__fadeIn'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOut'
                        }
                    });
                });
            </script>
        @endif

        <div class="container mx-auto px-4 pt-8">
            <!-- Título principal con diseño mejorado -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-700 via-purple-700 to-blue-700">
                    Gestión de Mascota
                </h1>
                <p class="text-gray-600 mt-2">Administra la información y registros médicos</p>
            </div>

            <!-- Tabs de navegación principal con animaciones mejoradas -->
            <div class="overflow-x-auto">
                <div class="border-b-2 border-indigo-200 mb-8 bg-white/40 rounded-t-xl backdrop-blur-sm p-1 shadow-sm">
                    <nav class="-mb-px flex space-x-10" aria-label="Tabs">
                        <a href="#tab-detalles" class="main-tab border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-3 border-b-2 font-medium text-sm transition-all duration-300 relative overflow-hidden group flex items-center">
                            <span class="absolute inset-0 bg-indigo-50 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                            <span class="relative inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Detalles</span>
                            </span>
                        </a>
                        <a href="#tab-vacunas" class="main-tab border-transparent text-gray-500 hover:text-indigo-700 hover:border-indigo-300 whitespace-nowrap py-4 px-3 border-b-2 font-medium text-sm transition-all duration-300 relative overflow-hidden group flex items-center">
                            <span class="absolute inset-0 bg-indigo-50 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                            <span class="relative inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-400 group-hover:text-indigo-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v9" />
                                </svg>
                                <span>Vacunas</span>
                            </span>
                        </a>
                        <a href="#tab-desparasitaciones" class="main-tab border-transparent text-gray-500 hover:text-indigo-700 hover:border-indigo-300 whitespace-nowrap py-4 px-3 border-b-2 font-medium text-sm transition-all duration-300 relative overflow-hidden group flex items-center">
                            <span class="absolute inset-0 bg-indigo-50 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                            <span class="relative inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-400 group-hover:text-indigo-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                                <span>Desparasitaciones</span>
                            </span>
                        </a>
                        <a href="#tab-visitas" class="main-tab border-transparent text-gray-500 hover:text-indigo-700 hover:border-indigo-300 whitespace-nowrap py-4 px-3 border-b-2 font-medium text-sm transition-all duration-300 relative overflow-hidden group flex items-center">
                            <span class="absolute inset-0 bg-indigo-50 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                            <span class="relative inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-400 group-hover:text-indigo-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Atenciones</span>
                            </span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Contenido de las pestañas con estilos modernos -->
            <div class="tab-content">
                <!-- Tab: Detalles de la mascota -->
                <div id="tab-detalles" class="tab-pane">
                    <form action="{{ route('admin.mascotas.update', $mascota) }}" method="POST" enctype="multipart/form-data" id="form-mascota">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Columna 1: Foto y datos básicos -->
                            <div class="lg:col-span-1 space-y-6">
                                <!-- Foto con efectos visuales mejorados -->
                                <div class="bg-gradient-to-br from-indigo-100 via-violet-50 to-blue-100 p-6 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 border border-indigo-200/50 group relative overflow-hidden">
                                    <!-- Decorative elements -->
                                    <div class="absolute -right-12 -top-12 w-32 h-32 bg-blue-300/20 rounded-full"></div>
                                    <div class="absolute -left-12 -bottom-12 w-32 h-32 bg-purple-300/20 rounded-full"></div>

                                    <div class="flex flex-col md:flex-row gap-6 items-center mb-6 relative">
                                        <div class="relative">
                                            <div id="list" class="w-44 h-44 bg-white rounded-2xl overflow-hidden flex items-center justify-center shadow-xl border-2 border-indigo-300 transition-all duration-500 hover:scale-105 hover:border-indigo-400 group-hover:shadow-indigo-200/50">
                                                <img src="{{url('storage/'.$mascota->foto) }}" class="thumb thumbnail object-cover w-full h-full" title="{{ $mascota->foto }}" />
                                            </div>
                                            <div class="absolute -bottom-3 -right-3 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-full p-3 shadow-lg transform transition-transform duration-500 hover:scale-110 hover:rotate-12 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="text-center md:text-left">
                                            <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-700 to-purple-700 mb-1">Foto de la Mascota</h2>
                                            <p class="text-indigo-600 font-medium text-base">Sube una imagen clara de tu mascota</p>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label for="file" class="flex flex-col items-center justify-center w-full h-48 border-3 border-dashed border-indigo-300 rounded-2xl cursor-pointer bg-white/80 backdrop-blur-sm hover:bg-indigo-50 hover:border-indigo-500 transition-all duration-300 group/upload">
                                            <div class="flex flex-col items-center justify-center p-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mb-4 text-indigo-500 group-hover/upload:text-indigo-600 transition-all duration-300 group-hover/upload:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                </svg>
                                                <div class="space-y-2 text-center">
                                                    <p class="text-lg font-semibold text-indigo-600 group-hover/upload:text-indigo-700">Selecciona una foto</p>
                                                    <p class="text-sm text-gray-600">Arrastra y suelta o haz clic para explorar</p>
                                                    <p class="text-xs text-gray-500 bg-white/80 px-3 py-1.5 rounded-full inline-block mt-2 shadow-sm">JPG, JPEG, PNG (Máx. 2MB)</p>
                                                </div>
                                            </div>
                                            <input id="file" type="file" name="foto" class="hidden" accept="image/*" />
                                        </label>

                                        <div class="absolute -top-2 right-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md">Requerido</div>
                                    </div>

                                    @error('foto')
                                    <div class="mt-4 bg-rose-50 border-l-4 border-rose-500 text-rose-700 px-4 py-3 rounded-lg flex items-center gap-3 shadow-md animate-pulse">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:scale-[1.01] relative">
                                    <!-- Decorative elements -->
                                    <div class="absolute -right-5 -bottom-10 w-24 h-24 bg-indigo-100 rounded-full opacity-50"></div>

                                    <div class="px-6 py-5 bg-gradient-to-r from-indigo-700 to-purple-700 relative">
                                        <div class="absolute right-0 top-0 w-32 h-32 bg-white/10 rounded-full -mr-10 -mt-10"></div>
                                        <h2 class="text-xl font-bold text-white flex items-center relative z-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                            Estado y opciones
                                        </h2>
                                    </div>
                                    <div class="p-6 space-y-5 relative z-10">
                                        <!-- Estado con diseño más atractivo -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                                Estado de la mascota <span class="text-rose-500">*</span>
                                            </label>
                                            <div class="grid grid-cols-3 gap-3">
                                                <label class="relative cursor-pointer border-2 rounded-xl px-3 py-4 flex items-center justify-center transition-all duration-300
                                                        {{ old('estado', $mascota->estado) == 'Activo' ? 'bg-emerald-50 border-emerald-500 ring-2 ring-emerald-200' : 'bg-white border-gray-200 hover:border-emerald-400 hover:bg-emerald-50' }}"
                                                       for="estado-activo">
                                                    <input type="radio" id="estado-activo" name="estado" value="Activo"
                                                           class="sr-only" {{ old('estado', $mascota->estado) == 'Activo' ? 'checked' : '' }} required>
                                                    <span class="flex items-center justify-center text-sm {{ old('estado', $mascota->estado) == 'Activo' ? 'text-emerald-700 font-medium' : 'text-gray-700' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Activo
                                                </span>
                                                </label>
                                                <label class="relative cursor-pointer border-2 rounded-xl px-3 py-4 flex items-center justify-center transition-all duration-300
                                                        {{ old('estado', $mascota->estado) == 'Inactivo' ? 'bg-amber-50 border-amber-500 ring-2 ring-amber-200' : 'bg-white border-gray-200 hover:border-amber-400 hover:bg-amber-50' }}"
                                                       for="estado-inactivo">
                                                    <input type="radio" id="estado-inactivo" name="estado" value="Inactivo"
                                                           class="sr-only" {{ old('estado', $mascota->estado) == 'Inactivo' ? 'checked' : '' }}>
                                                    <span class="flex items-center justify-center text-sm {{ old('estado', $mascota->estado) == 'Inactivo' ? 'text-amber-700 font-medium' : 'text-gray-700' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                    Inactivo
                                                </span>
                                                </label>
                                                <label class="relative cursor-pointer border-2 rounded-xl px-3 py-4 flex items-center justify-center transition-all duration-300
                                                        {{ old('estado', $mascota->estado) == 'Fallecido' ? 'bg-rose-50 border-rose-500 ring-2 ring-rose-200' : 'bg-white border-gray-200 hover:border-rose-400 hover:bg-rose-50' }}"
                                                       for="estado-fallecido">
                                                    <input type="radio" id="estado-fallecido" name="estado" value="Fallecido"
                                                           class="sr-only" {{ old('estado', $mascota->estado) == 'Fallecido' ? 'checked' : '' }}>
                                                    <span class="flex items-center justify-center text-sm {{ old('estado', $mascota->estado) == 'Fallecido' ? 'text-rose-700 font-medium' : 'text-gray-700' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Fallecido
                                                </span>
                                                </label>
                                            </div>
                                            @error('estado')
                                            <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Toggle switch de esterilización atractivo con más animación -->
                                        <div class="mt-8">
                                            <label class="flex items-center cursor-pointer p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl hover:from-indigo-100 hover:to-purple-100 transition-colors duration-300 shadow-sm relative overflow-hidden group/toggle">
                                                <div class="absolute inset-0 opacity-0 group-hover/toggle:opacity-100 transition-opacity duration-300">
                                                    <div class="absolute -right-6 -top-6 w-12 h-12 bg-indigo-200 rounded-full opacity-30"></div>
                                                    <div class="absolute -left-6 -bottom-6 w-12 h-12 bg-purple-200 rounded-full opacity-30"></div>
                                                </div>

                                                <div class="relative inline-block align-middle">
                                                    <input type="checkbox" name="esterilizado" id="esterilizado" value="1"
                                                           {{ old('esterilizado', $mascota->esterilizado) ? 'checked' : '' }}
                                                           class="hidden peer">
                                                    <div class="w-14 h-7 bg-gray-200 rounded-full shadow-inner peer-checked:bg-gradient-to-r peer-checked:from-indigo-400 peer-checked:to-purple-500 transition-all duration-500"></div>
                                                    <div class="absolute w-6 h-6 bg-white rounded-full shadow left-0.5 top-0.5 peer-checked:left-7 transition-all duration-500 flex items-center justify-center overflow-hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500 opacity-0 peer-checked:opacity-100 transition-opacity duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <span class="font-medium text-gray-700 ml-4 relative z-10">Esterilizado/a</span>
                                            </label>
                                        </div>

                                        <div class="border-t border-gray-200 pt-5 mt-6">
                                            <div class="flex justify-center space-x-4">
                                                <a href="{{ route('admin.mascotas.show', $mascota) }}"
                                                   class="inline-flex items-center px-5 py-2.5 border border-gray-300 shadow-md text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Cancelar
                                                </a>
                                                <button type="submit"
                                                        class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-xl shadow-md text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <div class="lg:col-span-2 space-y-6">
                                <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:scale-[1.01] relative">
                                    <!-- Decorative elements -->
                                    <div class="absolute left-1/2 top-0 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-transparent via-indigo-500 to-transparent"></div>

                                    <div class="px-8 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center relative overflow-hidden">
                                        <div class="absolute right-0 top-0 w-40 h-40 bg-gradient-to-br from-white/20 to-transparent rounded-full -mr-20 -mt-20 opacity-50"></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        <h2 class="text-xl font-bold text-white">Información básica</h2>
                                    </div>
                                    <div class="p-8">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Paciente (dueño) -->
                                            <div class="relative z-10">
                                                <label for="paciente_id" class="block text-sm font-medium text-gray-700 mb-1">Dueño <span class="text-rose-500">*</span></label>
                                                <div class="relative group">
                                                    <select name="paciente_id" id="paciente_id"
                                                            class="appearance-none block w-full px-4 py-3.5 border border-gray-300 rounded-xl shadow-sm
                                                              focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                                              @error('paciente_id') border-rose-500 ring-1 ring-rose-500 @enderror
                                                              group-hover:border-indigo-300 transition-colors duration-200" required>
                                                        <option value="">Seleccione un dueño</option>
                                                        @foreach($pacientes as $paciente)
                                                            <option value="{{ $paciente->id }}" {{ old('paciente_id', $mascota->paciente_id) == $paciente->id ? 'selected' : '' }}>
                                                                {{ $paciente->apellidos }}, {{ $paciente->nombres }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 pt-0.5">
                                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                @error('paciente_id')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Nombre -->
                                            <div>
                                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre <span class="text-rose-500">*</span></label>
                                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $mascota->nombre) }}"
                                                       class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                             border-gray-300 rounded-xl px-4 py-3.5 @error('nombre') border-rose-500 ring-1 ring-rose-500 @enderror
                                                             hover:border-indigo-300 transition-colors duration-200" required>
                                                @error('nombre')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Especie con select mejorado -->
                                            <div class="relative">
                                                <label for="especie" class="block text-sm font-medium text-gray-700 mb-1">Especie <span class="text-rose-500">*</span></label>
                                                <div class="relative group">
                                                    <select name="especie" id="especie"
                                                            class="appearance-none block w-full px-4 py-3.5 border border-gray-300 rounded-xl shadow-md
                                                              focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                                                              @error('especie') border-rose-500 ring-1 ring-rose-500 @enderror
                                                              group-hover:border-indigo-300 transition-colors duration-200" required>
                                                        <option value="">Seleccione la especie</option>
                                                        <option value="Perro" {{ old('especie', $mascota->especie) == 'Perro' ? 'selected' : '' }}>Perro</option>
                                                        <option value="Gato" {{ old('especie', $mascota->especie) == 'Gato' ? 'selected' : '' }}>Gato</option>
                                                        <option value="Ave" {{ old('especie', $mascota->especie) == 'Ave' ? 'selected' : '' }}>Ave</option>
                                                        <option value="Roedor" {{ old('especie', $mascota->especie) == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                                                        <option value="Reptil" {{ old('especie', $mascota->especie) == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                                                        <option value="Otro" {{ old('especie', $mascota->especie) == 'Otro' ? 'selected' : '' }}>Otro</option>
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 pt-0.5">
                                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                @error('especie')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Raza -->
                                            <div>
                                                <label for="raza" class="block text-sm font-medium text-gray-700 mb-1">Raza</label>
                                                <input type="text" name="raza" id="raza" value="{{ old('raza', $mascota->raza) }}"
                                                       class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                             border-gray-300 rounded-xl px-4 py-3.5 @error('raza') border-rose-500 ring-1 ring-rose-500 @enderror
                                                             hover:border-indigo-300 transition-colors duration-200">
                                                @error('raza')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Color con ícono decorativo -->
                                            <div>
                                                <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                                <div class="flex">
                                                    <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-gray-300 bg-gradient-to-r from-gray-50 to-gray-100 text-gray-500 sm:text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                                        </svg>
                                                    </span>
                                                    <input type="text" name="color" id="color" value="{{ old('color', $mascota->color) }}"
                                                           class="flex-1 shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 sm:text-sm
                                                                 border-gray-300 rounded-r-xl px-4 py-3.5 @error('color') border-rose-500 ring-1 ring-rose-500 @enderror
                                                                 hover:border-indigo-300 transition-colors duration-200">
                                                </div>
                                                @error('color')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Sexo con selección visual atractiva -->
                                            <div>
                                                <label for="sexo" class="block text-sm font-medium text-gray-700 mb-1">Sexo</label>
                                                <div class="flex space-x-4">
                                                    <label class="relative cursor-pointer border-2 rounded-xl px-4 py-3.5 flex items-center justify-center flex-1 transition-all duration-300
                                                            {{ old('sexo', $mascota->sexo) == 'Macho' ? 'bg-blue-50 border-blue-500 ring-2 ring-blue-200' : 'bg-white border-gray-200 hover:border-blue-300 hover:bg-blue-50' }}"
                                                           for="sexo-macho">
                                                        <input type="radio" id="sexo-macho" name="sexo" value="Macho"
                                                               class="sr-only" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'checked' : '' }}>
                                                        <span class="flex items-center justify-center text-sm {{ old('sexo', $mascota->sexo) == 'Macho' ? 'text-blue-700 font-medium' : 'text-gray-700' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 {{ old('sexo', $mascota->sexo) == 'Macho' ? 'text-blue-600' : 'text-gray-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Macho
                                                        </span>
                                                    </label>
                                                    <label class="relative cursor-pointer border-2 rounded-xl px-4 py-3.5 flex items-center justify-center flex-1 transition-all duration-300
                                                            {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'bg-pink-50 border-pink-500 ring-2 ring-pink-200' : 'bg-white border-gray-200 hover:border-pink-300 hover:bg-pink-50' }}"
                                                           for="sexo-hembra">
                                                        <input type="radio" id="sexo-hembra" name="sexo" value="Hembra"
                                                               class="sr-only" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'checked' : '' }}>
                                                        <span class="flex items-center justify-center text-sm {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'text-pink-700 font-medium' : 'text-gray-700' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'text-pink-600' : 'text-gray-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Hembra
                                                        </span>
                                                    </label>
                                                </div>
                                                @error('sexo')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Fecha de nacimiento con ícono integrado -->
                                            <div>
                                                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de nacimiento</label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                                                           value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('Y-m-d') : '') }}"
                                                           class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 sm:text-sm
                                                                 border-gray-300 rounded-xl px-4 py-3.5 @error('fecha_nacimiento') border-rose-500 ring-1 ring-rose-500 @enderror
                                                                 hover:border-indigo-300 transition-colors duration-200">
                                                </div>
                                                @error('fecha_nacimiento')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Peso con unidad de medida y decoración -->
                                            <div>
                                                <label for="peso" class="block text-sm font-medium text-gray-700 mb-1">Peso (kg)</label>
                                                <div class="relative rounded-xl shadow-md">
                                                    <input type="number" name="peso" id="peso" value="{{ old('peso', $mascota->peso) }}"
                                                           step="0.01" min="0.1" max="999.99"
                                                           class="focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-14 sm:text-sm
                                                                 border-gray-300 rounded-xl px-4 py-3.5 @error('peso') border-rose-500 ring-1 ring-rose-500 @enderror
                                                                 hover:border-indigo-300 transition-colors duration-200">
                                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                                        <span class="text-gray-500 bg-gray-100 px-2 py-1 rounded-lg text-sm">kg</span>
                                                    </div>
                                                </div>
                                                @error('peso')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:scale-[1.01] relative">
                                    <!-- Decorative elements -->
                                    <div class="absolute left-1/2 top-0 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-transparent via-teal-500 to-transparent"></div>

                                    <div class="px-8 py-5 bg-gradient-to-r from-teal-600 to-emerald-600 flex items-center relative overflow-hidden">
                                        <div class="absolute right-0 top-0 w-40 h-40 bg-gradient-to-br from-white/20 to-transparent rounded-full -mr-20 -mt-20 opacity-50"></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <h2 class="text-xl font-bold text-white">Información médica</h2>
                                    </div>
                                    <div class="p-8">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Textareas mejorados con estética consistente -->
                                            <!-- Características especiales -->
                                            <div>
                                                <label for="caracteristicas_especiales" class="block text-sm font-medium text-gray-700 mb-1">Características especiales</label>
                                                <textarea name="caracteristicas_especiales" id="caracteristicas_especiales" rows="3"
                                                          class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                                               border-gray-300 rounded-xl px-4 py-3.5 @error('caracteristicas_especiales') border-rose-500 ring-1 ring-rose-500 @enderror
                                                               hover:border-teal-300 transition-colors duration-200"
                                                          placeholder="Señas particulares, marcas distintivas, etc.">{{ old('caracteristicas_especiales', $mascota->caracteristicas_especiales) }}</textarea>
                                                @error('caracteristicas_especiales')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Alergias -->
                                            <div>
                                                <label for="alergias" class="block text-sm font-medium text-gray-700 mb-1">Alergias</label>
                                                <textarea name="alergias" id="alergias" rows="3"
                                                          class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                                               border-gray-300 rounded-xl px-4 py-3.5 @error('alergias') border-rose-500 ring-1 ring-rose-500 @enderror
                                                               hover:border-teal-300 transition-colors duration-200"
                                                          placeholder="Alimentos, medicamentos, etc.">{{ old('alergias', $mascota->alergias) }}</textarea>
                                                @error('alergias')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Condiciones médicas -->
                                            <div>
                                                <label for="condiciones_medicas" class="block text-sm font-medium text-gray-700 mb-1">Condiciones médicas</label>
                                                <textarea name="condiciones_medicas" id="condiciones_medicas" rows="3"
                                                          class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                                               border-gray-300 rounded-xl px-4 py-3.5 @error('condiciones_medicas') border-rose-500 ring-1 ring-rose-500 @enderror
                                                               hover:border-teal-300 transition-colors duration-200"
                                                          placeholder="Enfermedades crónicas, condiciones diagnosticadas, etc.">{{ old('condiciones_medicas', $mascota->condiciones_medicas) }}</textarea>
                                                @error('condiciones_medicas')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Medicación actual -->
                                            <div>
                                                <label for="medicacion_actual" class="block text-sm font-medium text-gray-700 mb-1">Medicación actual</label>
                                                <textarea name="medicacion_actual" id="medicacion_actual" rows="3"
                                                          class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                                               border-gray-300 rounded-xl px-4 py-3.5 @error('medicacion_actual') border-rose-500 ring-1 ring-rose-500 @enderror
                                                               hover:border-teal-300 transition-colors duration-200"
                                                          placeholder="Medicamentos, suplementos, dosis, frecuencia, etc.">{{ old('medicacion_actual', $mascota->medicacion_actual) }}</textarea>
                                                @error('medicacion_actual')
                                                <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Tab: Vacunas -->
                <div id="tab-vacunas" class="tab-pane hidden">
                    <!-- Registrar nueva vacuna -->
                    @can('admin.vacunas.store')
                        <div class="mb-8 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-indigo-100 relative">
                            <!-- Decorative elements -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-500"></div>

                            <div class="px-8 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center relative overflow-hidden">
                                <div class="absolute right-0 top-0 w-40 h-40 bg-gradient-to-br from-white/20 to-transparent rounded-full -mr-20 -mt-20 opacity-50"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h2 class="text-xl font-bold text-white">Registrar nueva vacuna</h2>
                            </div>
                            <div class="p-8">
                                <form action="{{ route('admin.vacunas.store') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                            <label for="nombre_vacuna" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la vacuna <span class="text-rose-500">*</span></label>
                                            <input type="text" name="nombre_vacuna" id="nombre_vacuna" required
                                                   class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                                        </div>

                                        <div>
                                            <label for="fecha_aplicacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de aplicación <span class="text-rose-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required
                                                       class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="fecha_proxima" class="block text-sm font-medium text-gray-700 mb-1">Próxima aplicación</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <input type="date" name="fecha_proxima" id="fecha_proxima"
                                                       class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="lote" class="block text-sm font-medium text-gray-700 mb-1">Lote</label>
                                            <input type="text" name="lote" id="lote"
                                                   class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                                        </div>

                                        <div>
                                            <label for="veterinario" class="block text-sm font-medium text-gray-700 mb-1">Veterinario</label>
                                            <input type="text" name="veterinario" id="veterinario"
                                                   class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="notas" class="block text-sm font-medium text-gray-700 mb-1">Notas</label>
                                        <textarea name="notas" id="notas" rows="2"
                                                  class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                                   border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200"></textarea>
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit"
                                                class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-xl shadow-md text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            Registrar vacuna
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan

                    <!-- Listado de vacunas en tarjetas -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-5 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Vacunas registradas
                    </h3>

                    @if(count($mascota->vacunas) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($mascota->vacunas as $vacuna)
                                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 border border-indigo-200 overflow-hidden transform hover:-translate-y-2 hover:border-indigo-300 duration-300 relative">
                                    <!-- Decorative elements -->
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-400"></div>

                                    <div class="px-4 py-3.5 bg-gradient-to-r from-indigo-50 to-blue-50 border-b border-indigo-100">
                                        <div class="flex justify-between items-center">
                                            <h4 class="font-semibold text-indigo-700 truncate">{{ $vacuna->nombre_vacuna }}</h4>
                                            <span class="text-xs bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full font-medium shadow-sm">
                                                {{ $vacuna->lote ?? 'No especificado' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="space-y-2.5 mb-4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-500 font-medium">Aplicada:</span>
                                                <span class="text-sm font-medium text-gray-700 bg-gray-50 px-3 py-1 rounded-lg">{{ $vacuna->fecha_aplicacion->format('d/m/Y') }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-500 font-medium">Próxima:</span>
                                                @if($vacuna->fecha_proxima)
                                                    <span class="text-sm font-medium {{ $vacuna->fecha_proxima->isPast() ? 'text-rose-600 bg-rose-50' : 'text-emerald-600 bg-emerald-50' }} px-3 py-1 rounded-lg">
                                                        {{ $vacuna->fecha_proxima->format('d/m/Y') }}
                                                    </span>
                                                @else
                                                    <span class="text-sm text-gray-400 bg-gray-50 px-3 py-1 rounded-lg">No programada</span>
                                                @endif
                                            </div>
                                            @if($vacuna->veterinario)
                                                <div class="flex justify-between items-center">
                                                    <span class="text-sm text-gray-500 font-medium">Veterinario:</span>
                                                    <span class="text-sm text-gray-700">{{ $vacuna->veterinario }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        @if($vacuna->notas)
                                            <div class="mt-4 pt-3 border-t border-gray-100">
                                                <p class="text-xs text-gray-600 line-clamp-2">{{ $vacuna->notas }}</p>
                                            </div>
                                        @endif

                                        <div class="mt-5 pt-3 border-t border-gray-100 flex justify-end space-x-3">
                                            @can('admin.vacunas.update')
                                                <button type="button"
                                                        onclick="editarVacuna(
                                                        '{{ $vacuna->id }}',
                                                        '{{ addslashes($vacuna->nombre_vacuna) }}',
                                                        '{{ $vacuna->fecha_aplicacion->format('Y-m-d') }}',
                                                        '{{ $vacuna->fecha_proxima ? $vacuna->fecha_proxima->format('Y-m-d') : '' }}',
                                                        '{{ addslashes($vacuna->lote ?? '') }}',
                                                        '{{ addslashes($vacuna->veterinario ?? '') }}',
                                                        '{{ addslashes($vacuna->notas ?? '') }}'
                                                     )"
                                                        class="inline-flex items-center px-3.5 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Editar
                                                </button>
                                            @endcan

                                            @can('admin.vacunas.destroy')
                                                <form action="{{ route('admin.vacunas.destroy', $vacuna) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta vacuna?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3.5 py-2 border border-transparent shadow-sm text-xs font-medium rounded-lg text-white bg-gradient-to-r from-rose-500 to-red-500 hover:from-rose-600 hover:to-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gradient-to-br from-gray-50 to-indigo-50 rounded-3xl p-10 text-center shadow-lg border border-indigo-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-indigo-300 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="text-2xl font-medium text-gray-700 mb-3">No hay vacunas registradas</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">Aún no se han registrado vacunas para esta mascota. Las vacunas son importantes para prevenir enfermedades y mantener sana a tu mascota.</p>
                            @can('admin.vacunas.store')
                                <button type="button" onclick="document.querySelector('#tab-vacunas form').scrollIntoView({behavior: 'smooth'})"
                                        class="inline-flex items-center px-5 py-3 border border-transparent shadow-lg text-base font-medium rounded-xl text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Registrar primera vacuna
                                </button>
                            @endcan
                        </div>
                    @endif
                </div>

                <!-- Tab: Desparasitaciones -->
                <div id="tab-desparasitaciones" class="tab-pane hidden">
                    <!-- Registrar nueva desparasitación -->
                    @can('admin.desparasitaciones.store')
                        <div class="mb-8 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-teal-100 relative">
                            <!-- Decorative elements -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-teal-500 via-emerald-500 to-teal-500"></div>

                            <div class="px-8 py-5 bg-gradient-to-r from-teal-600 to-emerald-600 flex items-center relative overflow-hidden">
                                <div class="absolute right-0 top-0 w-40 h-40 bg-gradient-to-br from-white/20 to-transparent rounded-full -mr-20 -mt-20 opacity-50"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h2 class="text-xl font-bold text-white">Registrar nueva desparasitación</h2>
                            </div>
                            <div class="p-8">
                                <form action="{{ route('admin.desparasitaciones.store') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                        <div>
                                            <label for="medicamento" class="block text-sm font-medium text-gray-700 mb-1">Medicamento <span class="text-rose-500">*</span></label>
                                            <input type="text" name="medicamento" id="medicamento" required
                                                   class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                                        </div>

                                        <div>
                                            <label for="fecha_aplicacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de aplicación <span class="text-rose-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required
                                                       class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="fecha_proxima" class="block text-sm font-medium text-gray-700 mb-1">Próxima aplicación</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <input type="date" name="fecha_proxima" id="fecha_proxima"
                                                       class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="peso_aplicacion" class="block text-sm font-medium text-gray-700 mb-1">Peso en aplicación (kg)</label>
                                            <div class="relative rounded-xl shadow-md">
                                                <input type="number" name="peso_aplicacion" id="peso_aplicacion" step="0.01" min="0.1" max="999.99" value="{{ $mascota->peso }}"
                                                       class="focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full pr-14 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                                    <span class="text-gray-500 bg-gray-100 px-2 py-1 rounded-lg text-sm">kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="notas" class="block text-sm font-medium text-gray-700 mb-1">Notas</label>
                                        <textarea name="notas" id="notas" rows="2"
                                                  class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                                   border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200"></textarea>
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit"
                                                class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-xl shadow-md text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            Registrar desparasitación
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan

                    <!-- Listado de desparasitaciones -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-5 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Desparasitaciones registradas
                    </h3>

                    @if(count($mascota->desparasitaciones) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($mascota->desparasitaciones as $desparasitacion)
                                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 border border-teal-200 overflow-hidden transform hover:-translate-y-2 hover:border-teal-300 duration-300 relative">
                                    <!-- Decorative elements -->
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-teal-400 via-emerald-500 to-teal-400"></div>

                                    <div class="px-4 py-3.5 bg-gradient-to-r from-teal-50 to-emerald-50 border-b border-teal-100">
                                        <div class="flex justify-between items-center">
                                            <h4 class="font-semibold text-teal-700 truncate">{{ $desparasitacion->medicamento }}</h4>
                                            @if($desparasitacion->peso_aplicacion)
                                                <span class="text-xs bg-teal-100 text-teal-800 px-3 py-1 rounded-full font-medium shadow-sm">
                                                    {{ $desparasitacion->peso_aplicacion }} kg
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="space-y-2.5 mb-4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-500 font-medium">Aplicada:</span>
                                                <span class="text-sm font-medium text-gray-700 bg-gray-50 px-3 py-1 rounded-lg">{{ $desparasitacion->fecha_aplicacion->format('d/m/Y') }}</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-500 font-medium">Próxima:</span>
                                                @if($desparasitacion->fecha_proxima)
                                                    <span class="text-sm font-medium {{ $desparasitacion->fecha_proxima->isPast() ? 'text-rose-600 bg-rose-50' : 'text-emerald-600 bg-emerald-50' }} px-3 py-1 rounded-lg">
                                                        {{ $desparasitacion->fecha_proxima->format('d/m/Y') }}
                                                    </span>
                                                @else
                                                    <span class="text-sm text-gray-400 bg-gray-50 px-3 py-1 rounded-lg">No programada</span>
                                                @endif
                                            </div>
                                        </div>

                                        @if($desparasitacion->notas)
                                            <div class="mt-4 pt-3 border-t border-gray-100">
                                                <p class="text-xs text-gray-600 line-clamp-2">{{ $desparasitacion->notas }}</p>
                                            </div>
                                        @endif

                                        <div class="mt-5 pt-3 border-t border-gray-100 flex justify-end space-x-3">
                                            @can('admin.desparasitaciones.update')
                                                <button type="button"
                                                        onclick="editarDesparasitacion(
                                                        '{{ $desparasitacion->id }}',
                                                        '{{ addslashes($desparasitacion->medicamento) }}',
                                                        '{{ $desparasitacion->fecha_aplicacion->format('Y-m-d') }}',
                                                        '{{ $desparasitacion->fecha_proxima ? $desparasitacion->fecha_proxima->format('Y-m-d') : '' }}',
                                                        '{{ $desparasitacion->peso_aplicacion ?? '' }}',
                                                        '{{ addslashes($desparasitacion->notas ?? '') }}'
                                                    )"
                                                        class="inline-flex items-center px-3.5 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Editar
                                                </button>
                                            @endcan

                                            @can('admin.desparasitaciones.destroy')
                                                <form action="{{ route('admin.desparasitaciones.destroy', $desparasitacion) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta desparasitación?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3.5 py-2 border border-transparent shadow-sm text-xs font-medium rounded-lg text-white bg-gradient-to-r from-rose-500 to-red-500 hover:from-rose-600 hover:to-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gradient-to-br from-gray-50 to-teal-50 rounded-3xl p-10 text-center shadow-lg border border-teal-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-teal-300 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="text-2xl font-medium text-gray-700 mb-3">No hay desparasitaciones registradas</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">Aún no se han registrado desparasitaciones para esta mascota. Desparasitar regularmente ayuda a prevenir problemas de salud.</p>
                            @can('admin.desparasitaciones.store')
                                <button type="button" onclick="document.querySelector('#tab-desparasitaciones form').scrollIntoView({behavior: 'smooth'})"
                                        class="inline-flex items-center px-5 py-3 border border-transparent shadow-lg text-base font-medium rounded-xl text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Registrar primera desparasitación
                                </button>
                            @endcan
                        </div>
                    @endif
                </div>

                <!-- Tab: Atenciones -->
                <div id="tab-visitas" class="tab-pane hidden">
                    <!-- Citas pendientes -->
                    <div class="mb-8 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-purple-100 relative">
                        <!-- Decorative elements -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 via-indigo-500 to-purple-500"></div>

                        <div class="px-8 py-5 bg-gradient-to-r from-purple-600 to-indigo-600 flex items-center relative overflow-hidden">
                            <div class="absolute right-0 top-0 w-40 h-40 bg-gradient-to-br from-white/20 to-transparent rounded-full -mr-20 -mt-20 opacity-50"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h2 class="text-xl font-bold text-white">Citas pendientes</h2>
                        </div>
                        <div class="p-8">
                            @php
                                $citasPendientes = \App\Models\Event::with(['doctor', 'consultorio'])
                                    ->where('estado', 'pendiente')
                                    ->where('mascota_id', $mascota->id)
                                    ->orderBy('start', 'asc')
                                    ->get();
                            @endphp

                            @if($citasPendientes->count() > 0)
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    @foreach($citasPendientes as $cita)
                                        <div class="border-2 border-blue-200 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 p-5 shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                                            <div class="flex flex-col space-y-3">
                                                <div class="flex justify-between">
                                                    <div class="text-blue-800 font-medium">
                                                        {{ \Carbon\Carbon::parse($cita->start)->format('d/m/Y H:i') }}
                                                    </div>
                                                    <div class="text-xs bg-blue-200 text-blue-800 px-3 py-1 rounded-full font-medium shadow-sm">
                                                        Pendiente
                                                    </div>
                                                </div>

                                                <div class="font-medium text-gray-700 text-lg">{{ $cita->title }}</div>

                                                <div class="flex items-center text-gray-600 text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    Dr. {{ $cita->doctor->nombres }} {{ $cita->doctor->apellidos }}
                                                </div>

                                                <div class="flex justify-end mt-3">
                                                    <button type="button"
                                                            class="usar-cita text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center bg-white px-4 py-2 rounded-lg shadow-sm hover:shadow border border-blue-200 transition-all duration-300"
                                                            data-cita="{{ $cita->id }}"
                                                            data-doctor="{{ $cita->doctor_id }}"
                                                            data-fecha="{{ \Carbon\Carbon::parse($cita->start)->format('Y-m-d') }}"
                                                            data-hora="{{ \Carbon\Carbon::parse($cita->start)->format('H:i') }}"
                                                            data-motivo="{{ $cita->title }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                        </svg>
                                                        Usar esta cita
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8 bg-gray-50 rounded-xl">
                                    <p class="text-gray-600 italic flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        No hay citas pendientes para esta mascota.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Registrar nueva atención -->
                    @can('admin.visitas.store')
                        <div class="mb-8 bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-purple-100">
                            <div class="px-8 py-5 bg-gradient-to-r from-purple-600 to-pink-600 flex items-center relative overflow-hidden">
                                <div class="absolute right-0 top-0 w-40 h-40 bg-gradient-to-br from-white/20 to-transparent rounded-full -mr-20 -mt-20 opacity-50"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <h2 class="text-xl font-bold text-white">Registrar nueva atención</h2>
                            </div>
                            <div class="p-8">
                                <form action="{{ route('admin.visitas.store') }}" method="POST" id="form-atencion" class="space-y-6">
                                    @csrf
                                    <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                    <input type="hidden" name="estado" value="Completada">
                                    <input type="hidden" name="crear_historial" value="1">
                                    <input type="hidden" name="event_id" id="event_id" value="">

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div class="relative z-10">
                                            <label for="doctor_id" class="block text-sm font-medium text-gray-700 mb-1">Doctor que atendió <span class="text-rose-500">*</span></label>
                                            <div class="relative">
                                                <select name="doctor_id" id="doctor_id" required
                                                        class="appearance-none block w-full px-4 py-3.5 border border-gray-300 rounded-xl shadow-md
                                                          focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                                                    <option value="">Seleccione un doctor</option>
                                                    @foreach(\App\Models\Doctor::with('specialties')->get() as $doctor)
                                                        <option value="{{ $doctor->id }}"
                                                                data-specialties="{{ $doctor->specialties->pluck('id') }}"
                                                                data-specialty-names="{{ $doctor->specialties->pluck('nombre') }}">
                                                            {{ $doctor->nombres }} {{ $doctor->apellidos }}
                                                            @if($doctor->specialties->count() > 0)
                                                                ({{ $doctor->specialties->pluck('nombre')->join(', ') }})
                                                            @else
                                                                (Sin especialidad)
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 pt-0.5">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative z-10">
                                            <label for="specialty_id" class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                                            <div class="relative">
                                                <select name="specialty_id" id="specialty_id"
                                                        class="appearance-none block w-full px-4 py-3.5 border border-gray-300 rounded-xl shadow-md
                                                          focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                                                    <option value="">Seleccione una especialidad</option>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 pt-0.5">
                                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="motivo_consulta" class="block text-sm font-medium text-gray-700 mb-1">Motivo de consulta <span class="text-rose-500">*</span></label>
                                            <input type="text" name="motivo_consulta" id="motivo_consulta" required
                                                   class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm
                                                     border-gray-300 rounded-xl px-4 py-3.5">
                                        </div>

                                        <div>
                                            <label for="fecha_visita" class="block text-sm font-medium text-gray-700 mb-1">Fecha de atención <span class="text-rose-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <input type="date" name="fecha_visita" id="fecha_visita" required value="{{ now()->format('Y-m-d') }}"
                                                       class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="hora_visita" class="block text-sm font-medium text-gray-700 mb-1">Hora de atención <span class="text-rose-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <input type="time" name="hora_visita" id="hora_visita" required value="{{ now()->format('H:i') }}"
                                                       class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="peso" class="block text-sm font-medium text-gray-700 mb-1">Peso actual (kg)</label>
                                            <div class="relative rounded-xl shadow-md">
                                                <input type="number" name="peso" id="peso" step="0.01" min="0.1" max="999.99" value="{{ $mascota->peso }}"
                                                       class="focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full pr-14 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                                    <span class="text-gray-500 bg-gray-100 px-2 py-1 rounded-lg text-sm">kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="temperatura" class="block text-sm font-medium text-gray-700 mb-1">Temperatura (°C)</label>
                                            <div class="relative rounded-xl shadow-md">
                                                <input type="number" name="temperatura" id="temperatura" step="0.1" min="30" max="45"
                                                       class="focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full pr-14 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                                    <span class="text-gray-500 bg-gray-100 px-2 py-1 rounded-lg text-sm">°C</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="fecha_seguimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de seguimiento</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <input type="date" name="fecha_seguimiento" id="fecha_seguimiento"
                                                       class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full pl-12 sm:text-sm
                                                         border-gray-300 rounded-xl px-4 py-3.5">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="sintomas" class="block text-sm font-medium text-gray-700 mb-1">Síntomas</label>
                                            <textarea name="sintomas" id="sintomas" rows="3"
                                                      class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm
                                                       border-gray-300 rounded-xl px-4 py-3.5"></textarea>
                                        </div>

                                        <div>
                                            <label for="diagnostico" class="block text-sm font-medium text-gray-700 mb-1">Diagnóstico</label>
                                            <textarea name="diagnostico" id="diagnostico" rows="3"
                                                      class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm
                                                       border-gray-300 rounded-xl px-4 py-3.5"></textarea>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="tratamiento" class="block text-sm font-medium text-gray-700 mb-1">Tratamiento</label>
                                            <textarea name="tratamiento" id="tratamiento" rows="3"
                                                      class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm
                                                       border-gray-300 rounded-xl px-4 py-3.5"></textarea>
                                        </div>

                                        <div>
                                            <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-1">Observaciones</label>
                                            <textarea name="observaciones" id="observaciones" rows="3"
                                                      class="shadow-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full sm:text-sm
                                                       border-gray-300 rounded-xl px-4 py-3.5"></textarea>
                                        </div>
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit"
                                                class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-xl shadow-md text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                            </svg>
                                            Registrar atención
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan

                    <!-- Historial de atenciones -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-5 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Atenciones registradas
                    </h3>

                    @if(count($mascota->visitas) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($mascota->visitas as $visita)
                                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 border overflow-hidden transform hover:-translate-y-2 duration-300
                                {{ $visita->estado == 'Completada' ? 'border-emerald-200' :
                                   ($visita->estado == 'Programada' ? 'border-blue-200' : 'border-rose-200') }}">
                                    <div class="px-5 py-4 bg-gradient-to-r
                                    {{ $visita->estado == 'Completada' ? 'from-emerald-50 to-emerald-100 border-b border-emerald-200' :
                                       ($visita->estado == 'Programada' ? 'from-blue-50 to-blue-100 border-b border-blue-200' : 'from-rose-50 to-rose-100 border-b border-rose-200') }}">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center">
                                        <span class="font-semibold
                                                    {{ $visita->estado == 'Completada' ? 'text-emerald-700' :
                                                      ($visita->estado == 'Programada' ? 'text-blue-700' : 'text-rose-700') }}">
                                            {{ $visita->fecha_visita->format('d/m/Y') }}
                                        </span>
                                                <span class="ml-2 text-gray-600">{{ $visita->hora_visita->format('H:i') }}</span>
                                            </div>
                                            <span class="text-xs
                                                {{ $visita->estado == 'Completada' ? 'bg-emerald-100 text-emerald-800' :
                                                  ($visita->estado == 'Programada' ? 'bg-blue-100 text-blue-800' : 'bg-rose-100 text-rose-800') }}
                                                px-3 py-1 rounded-full font-medium shadow-sm">
                                                {{ $visita->estado }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <p class="font-medium text-gray-800 mb-2 text-lg">{{ $visita->motivo_consulta }}</p>

                                        @if($visita->doctor)
                                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Dr. {{ $visita->doctor->nombres }} {{ $visita->doctor->apellidos }}
                                                @if($visita->specialty_id)
                                                    <span class="text-xs text-gray-500 ml-1">({{ optional(\App\Models\Specialty::find($visita->specialty_id))->nombre ?? 'Sin especialidad' }})</span>
                                                @endif
                                            </div>
                                        @endif

                                        @if($visita->diagnostico)
                                            <div class="mt-2 text-sm">
                                                <span class="text-gray-600 font-medium">Diagnóstico:</span>
                                                <span class="text-gray-800 ml-1">{{ Str::limit($visita->diagnostico, 80) }}</span>
                                            </div>
                                        @endif

                                        @if($visita->fecha_seguimiento)
                                            <div class="mt-2 text-sm flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span class="text-gray-600">Seguimiento:</span>
                                                <span class="text-gray-800 ml-1 bg-indigo-50 px-2 py-0.5 rounded-md text-xs font-medium">{{ $visita->fecha_seguimiento->format('d/m/Y') }}</span>
                                            </div>
                                        @endif

                                        <div class="mt-5 pt-3 border-t border-gray-100 flex flex-wrap justify-end gap-2">
                                            <a href="{{ route('admin.visitas.show', $visita) }}" class="inline-flex items-center px-3.5 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Ver detalles
                                            </a>

                                            @if($visita->estado == 'Programada')
                                                <form action="{{ route('admin.visitas.update', $visita) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="doctor_id" value="{{ $visita->doctor_id }}">
                                                    <input type="hidden" name="specialty_id" value="{{ $visita->specialty_id }}">
                                                    <input type="hidden" name="fecha_visita" value="{{ $visita->fecha_visita->format('Y-m-d') }}">
                                                    <input type="hidden" name="hora_visita" value="{{ $visita->hora_visita->format('H:i') }}">
                                                    <input type="hidden" name="motivo_consulta" value="{{ $visita->motivo_consulta }}">
                                                    <input type="hidden" name="peso" value="{{ $visita->peso }}">
                                                    <input type="hidden" name="temperatura" value="{{ $visita->temperatura }}">
                                                    <input type="hidden" name="sintomas" value="{{ $visita->sintomas }}">
                                                    <input type="hidden" name="diagnostico" value="{{ $visita->diagnostico }}">
                                                    <input type="hidden" name="tratamiento" value="{{ $visita->tratamiento }}">
                                                    <input type="hidden" name="observaciones" value="{{ $visita->observaciones }}">
                                                    <input type="hidden" name="fecha_seguimiento" value="{{ $visita->fecha_seguimiento ? $visita->fecha_seguimiento->format('Y-m-d') : '' }}">
                                                    <input type="hidden" name="estado" value="Completada">
                                                    <input type="hidden" name="crear_historial" value="1">
                                                    <button type="submit" class="inline-flex items-center px-3.5 py-2 border border-transparent shadow-sm text-xs font-medium rounded-lg text-white bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Completar
                                                    </button>
                                                </form>
                                            @endif

                                            @if($visita->estado == 'Completada')
                                                <a href="{{ route('admin.historial.porMascota', $mascota) }}" class="inline-flex items-center px-3.5 py-2 border border-indigo-600 shadow-sm text-xs font-medium rounded-lg text-indigo-700 bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    Historial
                                                </a>
                                            @endif

                                            @can('admin.visitas.destroy')
                                                <form action="{{ route('admin.visitas.destroy', $visita) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta atención?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3.5 py-2 border border-transparent shadow-sm text-xs font-medium rounded-lg text-white bg-gradient-to-r from-rose-500 to-red-500 hover:from-rose-600 hover:to-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-colors duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gradient-to-br from-gray-50 to-purple-50 rounded-3xl p-10 text-center shadow-lg border border-purple-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-purple-300 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="text-2xl font-medium text-gray-700 mb-3">No hay atenciones registradas</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">Aún no se han registrado atenciones para esta mascota. Las atenciones médicas son importantes para mantener un seguimiento de la salud de tu mascota.</p>
                            @can('admin.visitas.store')
                                <button type="button" onclick="document.querySelector('#tab-visitas form').scrollIntoView({behavior: 'smooth'})"
                                        class="inline-flex items-center px-5 py-3 border border-transparent shadow-lg text-base font-medium rounded-xl text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Registrar primera atención
                                </button>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar vacuna -->
    <div id="modalEditarVacuna" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div id="modalVacunaContent">
                    <!-- Contenido del modal (se llena con JavaScript) -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar desparasitación -->
    <div id="modalEditarDesparasitacion" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div id="modalDesparasitacionContent">
                    <!-- Contenido del modal (se llena con JavaScript) -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejar cambios de pestañas
            const tabs = document.querySelectorAll('.main-tab');
            const tabContent = document.querySelectorAll('.tab-pane');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('href');

                    // Ocultar todos los tab-pane
                    tabContent.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Mostrar el tab-pane seleccionado
                    document.querySelector(target).classList.remove('hidden');

                    // Cambiar la apariencia de las pestañas
                    tabs.forEach(t => {
                        t.classList.remove('border-indigo-500', 'text-indigo-600');
                        t.classList.add('border-transparent', 'text-gray-500');
                    });

                    this.classList.remove('border-transparent', 'text-gray-500');
                    this.classList.add('border-indigo-500', 'text-indigo-600');
                });
            });

            // Caso especial: usar cita para atención
            const botonesCita = document.querySelectorAll('.usar-cita');
            botonesCita.forEach(boton => {
                boton.addEventListener('click', function() {
                    // Obtener datos de la cita
                    const citaId = this.getAttribute('data-cita');
                    const doctorId = this.getAttribute('data-doctor');
                    const fecha = this.getAttribute('data-fecha');
                    const hora = this.getAttribute('data-hora');
                    const motivo = this.getAttribute('data-motivo');

                    // Cambiar a tab-visitas
                    document.querySelector('a[href="#tab-visitas"]').click();

                    // Llenar el formulario con los datos de la cita
                    document.getElementById('event_id').value = citaId;
                    document.getElementById('doctor_id').value = doctorId;
                    document.getElementById('fecha_visita').value = fecha;
                    document.getElementById('hora_visita').value = hora;
                    document.getElementById('motivo_consulta').value = motivo;

                    // Actualizar especialidades del doctor
                    updateSpecialties();

                    // Scroll al formulario
                    document.getElementById('form-atencion').scrollIntoView({behavior: 'smooth'});
                });
            });

            // Manejar cambio de doctor para actualizar especialidades
            const doctorSelect = document.getElementById('doctor_id');
            if (doctorSelect) {
                doctorSelect.addEventListener('change', updateSpecialties);
            }

            function updateSpecialties() {
                const doctorSelect = document.getElementById('doctor_id');
                const specialtySelect = document.getElementById('specialty_id');

                // Limpiar opciones actuales
                specialtySelect.innerHTML = '<option value="">Seleccione una especialidad</option>';

                if (doctorSelect.value) {
                    const selectedOption = doctorSelect.options[doctorSelect.selectedIndex];
                    const specialties = selectedOption.getAttribute('data-specialties');
                    const specialtyNames = selectedOption.getAttribute('data-specialty-names');

                    if (specialties && specialtyNames) {
                        const specialtyIds = JSON.parse(specialties.replace(/&quot;/g, '"'));
                        const names = JSON.parse(specialtyNames.replace(/&quot;/g, '"'));

                        for (let i = 0; i < specialtyIds.length; i++) {
                            const option = document.createElement('option');
                            option.value = specialtyIds[i];
                            option.textContent = names[i];
                            specialtySelect.appendChild(option);
                        }
                    }
                }
            }

// Función para editar vacuna (corregida con la ruta correcta)
            window.editarVacuna = function(id, nombre, fecha_aplicacion, fecha_proxima, lote, veterinario, notas) {
                const modal = document.getElementById('modalEditarVacuna');
                modal.classList.remove('hidden');

                // Llenar el modal directamente con los datos pasados como parámetros
                const modalContent = document.getElementById('modalVacunaContent');
                modalContent.innerHTML = `
        <div class="p-6 space-y-4">
            <form action="{{ route('admin.vacunas.update', '') }}/${id}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="edit_nombre_vacuna" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la vacuna <span class="text-rose-500">*</span></label>
                        <input type="text" name="nombre_vacuna" id="edit_nombre_vacuna" required value="${nombre}"
                              class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                    </div>

                    <div>
                        <label for="edit_fecha_aplicacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de aplicación <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" name="fecha_aplicacion" id="edit_fecha_aplicacion" required value="${fecha_aplicacion}"
                                  class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 sm:text-sm
                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="edit_fecha_proxima" class="block text-sm font-medium text-gray-700 mb-1">Próxima aplicación</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" name="fecha_proxima" id="edit_fecha_proxima" value="${fecha_proxima}"
                                  class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 sm:text-sm
                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="edit_lote" class="block text-sm font-medium text-gray-700 mb-1">Lote</label>
                        <input type="text" name="lote" id="edit_lote" value="${lote}"
                              class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                    </div>

                    <div>
                        <label for="edit_veterinario" class="block text-sm font-medium text-gray-700 mb-1">Veterinario</label>
                        <input type="text" name="veterinario" id="edit_veterinario" value="${veterinario}"
                              class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">
                    </div>
                </div>

                <div>
                    <label for="edit_notas" class="block text-sm font-medium text-gray-700 mb-1">Notas</label>
                    <textarea name="notas" id="edit_notas" rows="3"
                            class="shadow-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm
                                   border-gray-300 rounded-xl px-4 py-3.5 hover:border-indigo-300 transition-colors duration-200">${notas}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" class="px-4 py-2.5 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200"
                            onclick="document.getElementById('modalEditarVacuna').classList.add('hidden')">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-xl hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    `;
            }

            // Función para editar desparasitación (corregida con la ruta correcta)
            window.editarDesparasitacion = function(id, medicamento, fecha_aplicacion, fecha_proxima, peso_aplicacion, notas) {
                const modal = document.getElementById('modalEditarDesparasitacion');
                modal.classList.remove('hidden');

                // Llenar el modal directamente con los datos pasados como parámetros
                const modalContent = document.getElementById('modalDesparasitacionContent');
                modalContent.innerHTML = `
        <div class="p-6 space-y-4">
            <form action="{{ route('admin.desparasitaciones.update', '') }}/${id}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="edit_medicamento" class="block text-sm font-medium text-gray-700 mb-1">Medicamento <span class="text-rose-500">*</span></label>
                        <input type="text" name="medicamento" id="edit_medicamento" required value="${medicamento}"
                              class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                     border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                    </div>

                    <div>
                        <label for="edit_fecha_aplicacion" class="block text-sm font-medium text-gray-700 mb-1">Fecha de aplicación <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" name="fecha_aplicacion" id="edit_fecha_aplicacion" required value="${fecha_aplicacion}"
                                  class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full pl-12 sm:text-sm
                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="edit_fecha_proxima" class="block text-sm font-medium text-gray-700 mb-1">Próxima aplicación</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" name="fecha_proxima" id="edit_fecha_proxima" value="${fecha_proxima}"
                                  class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full pl-12 sm:text-sm
                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="edit_peso_aplicacion" class="block text-sm font-medium text-gray-700 mb-1">Peso en aplicación (kg)</label>
                        <div class="relative rounded-xl shadow-md">
                            <input type="number" name="peso_aplicacion" id="edit_peso_aplicacion" step="0.01" min="0.1" max="999.99" value="${peso_aplicacion}"
                                  class="focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full pr-14 sm:text-sm
                                         border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <span class="text-gray-500 bg-gray-100 px-2 py-1 rounded-lg text-sm">kg</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="edit_notas" class="block text-sm font-medium text-gray-700 mb-1">Notas</label>
                    <textarea name="notas" id="edit_notas" rows="3"
                            class="shadow-md focus:ring-2 focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm
                                   border-gray-300 rounded-xl px-4 py-3.5 hover:border-teal-300 transition-colors duration-200">${notas}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" class="px-4 py-2.5 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200"
                            onclick="document.getElementById('modalEditarDesparasitacion').classList.add('hidden')">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2.5 bg-gradient-to-r from-teal-600 to-emerald-600 text-white rounded-xl hover:from-teal-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors duration-200">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    `;
            }

            // Función para previsualizar la imagen de la mascota
            function archivo(evt) {
                var files = evt.target.files;
                for (var i = 0, f; f = files[i]; i++) {
                    if (!f.type.match('image.*')) {
                        continue;
                    }
                    var reader = new FileReader();
                    reader.onload = (function (theFile) {
                        return function (e) {
                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail object-cover w-full h-full" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
                    reader.readAsDataURL(f);
                }
            }
            document.getElementById('file').addEventListener('change', archivo, false);
        });
    </script>
@endsection
