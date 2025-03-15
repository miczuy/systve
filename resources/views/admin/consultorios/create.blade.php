@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50 flex items-center justify-center p-4">
        <div class="w-full max-w-2xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
            <!-- Encabezado con efecto vidrio -->
            <div class="relative bg-gradient-to-r from-indigo-700 to-purple-700 px-10 pt-8 pb-12">
                <div class="absolute inset-0 bg-noise opacity-10"></div>
                <div class="relative flex flex-col items-center space-y-4 text-center">
                    <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 5h1m4-3h1m-1 5h1m-5 5h5"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">Ficha de Consultorio</h1>
                        <p class="mt-1 text-indigo-100/90 font-light">Complete la información del consultorio</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/consultorios/create') }}" method="POST" class="px-10 py-8 space-y-8">
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

                <fieldset class="border border-gray-200/60 rounded-xl p-6 space-y-6">
                    <legend class="text-lg font-medium text-gray-800/90 text-center px-4">Información del Consultorio</legend>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Nombre <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="nombre"
                                       value="{{ old('nombre') }}"
                                       placeholder="Nombre del consultorio"
                                       required>
                                @error('nombre')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('nombre')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ubicación -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Ubicación <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <select class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white transition-all duration-200 shadow-sm appearance-none"
                                        name="ubicacion"
                                        required>
                                    <option value="" disabled selected>Seleccione ubicación</option>
                                    <option value="PB">PB (Planta Baja)</option>
                                    <option value="Laboratorio">Laboratorio</option>
                                    <option value="Consultorio 1">Consultorio 1</option>
                                    <option value="Consultorio 2">Consultorio 2</option>
                                    <option value="Sala de Espera">Sala de Espera</option>
                                    <option value="Área de Emergencias">Área de Emergencias</option>
                                </select>
                                @error('ubicacion')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('ubicacion')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Capacidad -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Capacidad <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="capacidad"
                                       value="{{ old('capacidad') }}"
                                       placeholder="Ej: 5 personas"
                                       required>
                                @error('capacidad')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('capacidad')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Teléfono</label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="telefono"
                                       value="{{ old('telefono') }}"
                                       placeholder="Número de contacto">
                            </div>
                        </div>

                        <!-- Especialidad -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Especialidad <span class="text-red-500">*</span></label>
                            <div class="relative group">
                                <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm"
                                       type="text"
                                       name="especialidad"
                                       value="{{ old('especialidad') }}"
                                       placeholder="Especialidad médica"
                                       required>
                                @error('especialidad')
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('especialidad')
                            <p class="text-sm text-red-600/90 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Botones -->
                <div class="flex justify-center space-x-3 mt-10">
                    <a href="{{ url('admin/consultorios') }}" class="px-6 py-3.5 border border-gray-300/80 text-gray-700/90 rounded-xl hover:bg-gray-50/50 transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-indigo-600 to-purple-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Registrar Consultorio</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
