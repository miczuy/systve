@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-violet-50 flex items-center justify-center p-6 font-sans">
        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
            <!-- Encabezado con efecto vidrio mejorado -->
            <div class="relative bg-gradient-to-r from-indigo-600 via-indigo-700 to-purple-800 px-8 pt-10 pb-14 overflow-hidden">
                <div class="absolute inset-0 bg-pattern opacity-15 mix-blend-overlay"></div>
                <div class="absolute bottom-0 left-0 right-0 h-10 bg-gradient-to-t from-purple-800/30 to-transparent"></div>

                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex items-center space-x-5">
                        <div class="p-3.5 bg-white/15 rounded-xl backdrop-blur-sm border border-white/20 shadow-lg ring-2 ring-white/10">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 5h1m4-3h1m-1 5h1m-5 5h5"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Ficha de Consultorio</h1>
                            <p class="mt-2 text-indigo-100 font-light text-base">Complete la información para registrar un nuevo consultorio</p>
                        </div>
                    </div>

                    <!-- Indicadores visuales -->
                    <div class="absolute top-4 right-4 flex space-x-1.5">
                        <div class="w-3 h-3 rounded-full bg-purple-300 animate-pulse"></div>
                        <div class="w-3 h-3 rounded-full bg-indigo-300"></div>
                        <div class="w-3 h-3 rounded-full bg-indigo-300"></div>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/consultorios/create') }}" method="POST" class="px-6 py-8 md:px-8 md:py-8 space-y-6">
                @csrf

                @if (session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl flex items-start space-x-3.5 shadow-sm animate-fade-in">
                        <div class="p-1.5 bg-red-100/70 rounded-lg mt-0.5">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-red-700 text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <fieldset class="border border-indigo-100 rounded-xl p-6 space-y-6 shadow-inner bg-gradient-to-br from-white to-indigo-50/30">
                    <legend class="text-base font-semibold text-indigo-800 text-center px-4 -mt-4">
                        <span class="bg-white px-4 py-1.5 rounded-lg shadow-sm">Información del Consultorio</span>
                    </legend>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nombre -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 flex items-center group-hover:text-indigo-800 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Nombre <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 5h1m4-3h1m-1 5h1m-5 5h5"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="nombre"
                                       value="{{ old('nombre') }}"
                                       placeholder="Nombre del consultorio"
                                       required>
                                @error('nombre')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('nombre')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Ubicación -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 flex items-center group-hover:text-indigo-800 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Ubicación <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </div>
                                <select class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white transition-all duration-200 shadow-sm appearance-none group-hover:ring-indigo-300 text-sm"
                                        name="ubicacion"
                                        required>
                                    <option value="" disabled selected>Seleccione ubicación</option>
                                    <option value="PB" {{ old('ubicacion') == 'PB' ? 'selected' : '' }}>PB (Planta Baja)</option>
                                    <option value="Laboratorio" {{ old('ubicacion') == 'Laboratorio' ? 'selected' : '' }}>Laboratorio</option>
                                    <option value="Consultorio 1" {{ old('ubicacion') == 'Consultorio 1' ? 'selected' : '' }}>Consultorio 1</option>
                                    <option value="Consultorio 2" {{ old('ubicacion') == 'Consultorio 2' ? 'selected' : '' }}>Consultorio 2</option>
                                    <option value="Sala de Espera" {{ old('ubicacion') == 'Sala de Espera' ? 'selected' : '' }}>Sala de Espera</option>
                                    <option value="Área de Emergencias" {{ old('ubicacion') == 'Área de Emergencias' ? 'selected' : '' }}>Área de Emergencias</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">

                                </div>
                            </div>
                            @error('ubicacion')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Capacidad -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 flex items-center group-hover:text-indigo-800 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Capacidad <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="capacidad"
                                       value="{{ old('capacidad') }}"
                                       placeholder="Ej: 5 personas"
                                       required>
                                @error('capacidad')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('capacidad')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 flex items-center group-hover:text-indigo-800 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Teléfono
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="telefono"
                                       value="{{ old('telefono') }}"
                                       placeholder="Número de contacto">
                            </div>
                        </div>

                        <!-- Especialidad - Ocupa columna completa en móvil y escritorio -->
                        <div class="space-y-1.5 group md:col-span-2">
                            <label class="block text-sm font-medium text-indigo-700 mb-1 ml-1 flex items-center group-hover:text-indigo-800 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                Especialidad <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <input class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-indigo-100 focus:ring-indigo-400/50 focus:bg-white placeholder-indigo-300/80 transition-all duration-200 shadow-sm group-hover:ring-indigo-300 text-sm"
                                       type="text"
                                       name="especialidad"
                                       value="{{ old('especialidad') }}"
                                       placeholder="Especialidad médica"
                                       required>
                                @error('especialidad')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('especialidad')
                            <p class="text-xs text-red-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Información de ayuda - Más compacta y mejor alineada -->
                <div class="bg-indigo-50 rounded-xl p-3 border border-indigo-100/80 flex items-start space-x-3">
                    <div class="p-1.5 bg-indigo-100 rounded-full text-indigo-600 flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-xs text-indigo-700">
                        <p class="font-medium mb-0.5">Información importante</p>
                        <p>Todos los campos marcados con <span class="text-red-500">*</span> son obligatorios. La información registrada será utilizada para la asignación de personal médico y citas.</p>
                    </div>
                </div>

                <!-- Botones de acción - Mejor espaciados -->
                <div class="flex flex-col sm:flex-row justify-center gap-3 pt-4">
                    <a href="{{ url('admin/consultorios') }}" class="px-6 py-3 bg-white border border-indigo-200 text-indigo-700 rounded-xl hover:bg-indigo-50 transition-all duration-200 flex items-center justify-center space-x-2 shadow-sm hover:shadow text-sm">
                        <svg class="w-4 h-4 text-indigo-500 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span class="font-medium">Volver al Listado</span>
                    </a>

                    <button type="submit" class="px-6 py-3 bg-gradient-to-br from-indigo-600 via-indigo-700 to-purple-700 text-white rounded-xl hover:shadow-md hover:shadow-indigo-200 transition-all duration-200 flex items-center justify-center space-x-2 group text-sm">
                        <svg class="w-4 h-4 text-white/90 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-medium">Registrar Consultorio</span>
                    </button>
                </div>
            </form>

            <!-- Footer - Más compacto -->
            <div class="px-6 py-3 bg-gradient-to-r from-indigo-50 to-purple-50 border-t border-indigo-100/80 text-center text-indigo-500 text-xs rounded-b-2xl">
                Huellitas del Corazon © {{ date('Y') }}
            </div>
        </div>
    </div>

    <style>
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Mejora visual para los campos de formulario enfocados */
        input:focus, select:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        /* Estilos personalizados para campos inválidos */
        input:invalid:focus, select:invalid:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
        }
    </style>
@endsection
