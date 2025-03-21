@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-cyan-50 via-slate-50 to-blue-50 flex items-center justify-center p-6 font-sans">
        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
            <!-- Encabezado con efecto vidrio médico mejorado -->
            <div class="relative bg-gradient-to-r from-cyan-600 via-blue-600 to-blue-700 px-8 pt-9 pb-14 overflow-hidden">
                <div class="absolute inset-0 bg-medical-pattern opacity-15 mix-blend-overlay"></div>
                <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-blue-700/30 to-transparent"></div>

                <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex items-center space-x-5">
                        <div class="p-3.5 bg-white/15 rounded-xl backdrop-blur-sm border border-white/20 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 5h1m4-3h1m-1 5h1m-5 5h5"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Modificar Consultorio</h1>
                            <p class="mt-2 text-blue-100 font-light text-sm">Actualiza la información del consultorio con los datos más recientes</p>
                        </div>
                    </div>

                    <!-- Badge de identificación -->
                    <div class="hidden md:block">
                        <div class="px-3 py-1.5 bg-white/10 backdrop-blur-sm rounded-lg border border-white/10 text-white text-sm">
                            ID: #{{ $consultorio->id }}
                        </div>
                    </div>

                    <!-- Indicadores visuales -->
                    <div class="absolute top-3 right-3 flex space-x-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-cyan-300 animate-pulse"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-blue-200"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-blue-200"></div>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/consultorios', $consultorio->id) }}" method="POST" class="px-6 py-8 md:px-8 md:py-8 space-y-6">
                @csrf
                @method('PUT')

                @if (session('error'))
                    <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-start space-x-3 animate-fade-in">
                        <div class="p-1.5 bg-rose-100/70 rounded-lg mt-0.5">
                            <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-rose-700 text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Información de estado actual -->
                <div class="bg-blue-50 rounded-xl p-3 border border-blue-100 flex items-start space-x-3 mb-2">
                    <div class="p-1.5 bg-blue-100 rounded-full text-blue-600 flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-xs text-blue-700">
                        <p class="font-medium mb-0.5">Estás editando un consultorio existente</p>
                        <p>Todos los campos son requeridos excepto el teléfono. Los cambios serán visibles inmediatamente después de actualizar.</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-white to-slate-50 rounded-xl p-6 shadow-sm border border-slate-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Campo de Nombre -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-slate-700 mb-1 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Nombre del Consultorio <span class="text-rose-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 5h1m4-3h1m-1 5h1m-5 5h5"/>
                                    </svg>
                                </div>
                                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $consultorio->nombre) }}"
                                       class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-slate-200 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm group-hover:ring-cyan-200 text-sm"
                                       required>
                                @error('nombre')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-rose-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('nombre')
                            <p class="text-xs text-rose-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Campo de Ubicación -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-slate-700 mb-1 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Ubicación <span class="text-rose-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </div>
                                <select name="ubicacion" id="ubicacion"
                                        class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-slate-200 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm appearance-none group-hover:ring-cyan-200 text-sm"
                                        required>
                                    <option value="" disabled>Seleccione una ubicación</option>
                                    <option value="PB" {{ old('ubicacion', $consultorio->ubicacion) == 'PB' ? 'selected' : '' }}>PB (Planta Baja)</option>
                                    <option value="Laboratorio" {{ old('ubicacion', $consultorio->ubicacion) == 'Laboratorio' ? 'selected' : '' }}>Laboratorio</option>
                                    <option value="Consultorio 1" {{ old('ubicacion', $consultorio->ubicacion) == 'Consultorio 1' ? 'selected' : '' }}>Consultorio 1</option>
                                    <option value="Consultorio 2" {{ old('ubicacion', $consultorio->ubicacion) == 'Consultorio 2' ? 'selected' : '' }}>Consultorio 2</option>
                                    <option value="Sala de Espera" {{ old('ubicacion', $consultorio->ubicacion) == 'Sala de Espera' ? 'selected' : '' }}>Sala de Espera</option>
                                    <option value="Área de Emergencias" {{ old('ubicacion', $consultorio->ubicacion) == 'Área de Emergencias' ? 'selected' : '' }}>Área de Emergencias</option>
                                </select>

                            </div>
                            @error('ubicacion')
                            <p class="text-xs text-rose-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Campo de Capacidad -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-slate-700 mb-1 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Capacidad <span class="text-rose-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <input type="text" id="capacidad" name="capacidad" value="{{ old('capacidad', $consultorio->capacidad) }}"
                                       class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-slate-200 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm group-hover:ring-cyan-200 text-sm"
                                       required>
                                @error('capacidad')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-rose-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('capacidad')
                            <p class="text-xs text-rose-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Campo de Teléfono -->
                        <div class="space-y-1.5 group">
                            <label class="block text-sm font-medium text-slate-700 mb-1 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Teléfono
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $consultorio->telefono) }}"
                                       class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-slate-200 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm group-hover:ring-cyan-200 text-sm"
                                       placeholder="(Opcional)">
                                @error('telefono')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-rose-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('telefono')
                            <p class="text-xs text-rose-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Campo de Especialidad -->
                        <div class="space-y-1.5 group md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 mb-1 ml-1 flex items-center group-hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                Especialidad <span class="text-rose-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-cyan-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad', $consultorio->especialidad) }}"
                                       class="w-full pl-10 pr-10 py-3 border-0 bg-white rounded-xl ring-2 ring-slate-200 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm group-hover:ring-cyan-200 text-sm"
                                       required>
                                @error('especialidad')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-rose-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('especialidad')
                            <p class="text-xs text-rose-600 mt-1 ml-1 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección de historial de cambios -->
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                    <h3 class="text-sm font-medium text-slate-700 flex items-center mb-2">
                        <svg class="w-4 h-4 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Historial de cambios
                    </h3>
                    <div class="text-xs text-slate-600 flex items-center justify-between">
                        <div>
                            <span class="font-medium">Creado:</span> {{ $consultorio->created_at->format('d/m/Y H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Última actualización:</span> {{ $consultorio->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row sm:justify-between gap-3 pt-4">
                    <a href="{{ url('admin/consultorios') }}" class="px-6 py-3 bg-white border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-50 transition-all duration-200 flex items-center justify-center space-x-2 shadow-sm hover:shadow text-sm order-2 sm:order-1">
                        <svg class="w-4 h-4 text-slate-500 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span class="font-medium">Volver al Listado</span>
                    </a>

                    <div class="flex gap-3 order-1 sm:order-2">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-br from-cyan-600 to-blue-700 text-white rounded-xl hover:shadow-md hover:shadow-blue-200 transition-all duration-200 flex items-center justify-center space-x-2 group text-sm">
                            <svg class="w-4 h-4 text-white/90 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="font-medium">Actualizar Consultorio</span>
                        </button>


                    </div>
                </div>
            </form>

            <!-- Footer más informativo -->
            <div class="px-6 py-3 bg-gradient-to-r from-cyan-50 to-blue-50 border-t border-slate-100 text-center text-slate-500 text-xs rounded-b-2xl">
                <p>Huellistas del Corazón © {{ date('Y') }}</p>
                <p class="text-xs mt-1 text-slate-400">Última actualización: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
            </div>
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

        /* Animación para el botón de actualizar */
        @keyframes checkmark {
            0% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        .group:hover .group-hover\:animate-pulse {
            animation: checkmark 0.6s ease-in-out;
        }
    </style>
@endsection
