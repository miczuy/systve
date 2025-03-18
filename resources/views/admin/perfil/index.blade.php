@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-50 py-12 flex items-center justify-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Cabecera mejorada con animación sutil -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 transform transition duration-300 hover:shadow-2xl">
                <!-- Encabezado con efecto vidrio -->
                <div class="relative bg-gradient-to-r from-indigo-700 to-purple-700 px-10 pt-8 pb-12">
                    <div class="absolute inset-0 bg-noise opacity-10"></div>
                    <div class="relative flex flex-col items-center space-y-4 text-center">
                        <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white tracking-tight">Perfil de Paciente</h1>
                            <p class="mt-1 text-indigo-100/90 font-light"> información personal y médica</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-20 bg-white/90 backdrop-blur-sm">
                    @if(session('mensaje'))
                        <div class="mb-6 bg-{{ session('icono') == 'success' ? 'green' : (session('icono') == 'info' ? 'blue' : 'red') }}-50 border-l-4 border-{{ session('icono') == 'success' ? 'green' : (session('icono') == 'info' ? 'blue' : 'red') }}-500 p-4 rounded-md shadow-sm animate-fadeIn">
                            <div class="flex items-center justify-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-{{ session('icono') == 'success' ? 'green' : (session('icono') == 'info' ? 'blue' : 'red') }}-500" fill="currentColor" viewBox="0 0 20 20">
                                        @if(session('icono') == 'success')
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        @elseif(session('icono') == 'info')
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        @else
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        @endif
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-{{ session('icono') == 'success' ? 'green' : (session('icono') == 'info' ? 'blue' : 'red') }}-700">
                                        {{ session('mensaje') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Información Personal con Card mejorada -->
                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition duration-300 border border-gray-100">
                            <h2 class="text-xl font-semibold text-gray-800 mb-5 flex items-center justify-center border-b pb-3 border-gray-100">
                                <div class="p-2 bg-indigo-100 rounded-lg mr-3">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                Información Personal
                            </h2>

                            <div class="space-y-4">
                                <div class="flex border-b border-gray-50 pb-2 group">
                                    <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-indigo-600 transition duration-300 text-right pr-4">Nombre:</span>
                                    <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->nombres }} {{ $paciente->apellidos }}</span>
                                </div>

                                <div class="flex border-b border-gray-50 pb-2 group">
                                    <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-indigo-600 transition duration-300 text-right pr-4">Cédula:</span>
                                    <span class="w-2/3 text-sm font-medium text-gray-900">
        @if(strpos($paciente->cedula, 'NE-') === 0)
                                            No especificado
                                        @else
                                            {{ $paciente->cedula }}
                                        @endif
    </span>
                                </div>

                                <div class="flex border-b border-gray-50 pb-2 group">
                                    <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-indigo-600 transition duration-300 text-right pr-4">Fecha de Nacimiento:</span>
                                    <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->fecha_nacimiento ? date('d/m/Y', strtotime($paciente->fecha_nacimiento)) : 'No especificado' }}</span>
                                </div>

                                <div class="flex border-b border-gray-50 pb-2 group">
                                    <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-indigo-600 transition duration-300 text-right pr-4">Edad:</span>
                                    <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->edad ?? 'No especificado' }}</span>
                                </div>

                                <div class="flex border-b border-gray-50 pb-2 group">
                                    <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-indigo-600 transition duration-300 text-right pr-4">Sexo:</span>
                                    <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->sexo ?? 'No especificado' }}</span>
                                </div>

                                <div class="flex group">
                                    <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-indigo-600 transition duration-300 text-right pr-4">Estado Civil:</span>
                                    <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->estado_civil ?? 'No especificado' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Información de Contacto con Card mejorada -->
                        <div>
                            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition duration-300 border border-gray-100 mb-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-5 flex items-center justify-center border-b pb-3 border-gray-100">
                                    <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    Información de Contacto
                                </h2>

                                <div class="space-y-4">
                                    <div class="flex border-b border-gray-50 pb-2 group">
                                        <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-purple-600 transition duration-300 text-right pr-4">Correo:</span>
                                        <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->correo }}</span>
                                    </div>

                                    <div class="flex border-b border-gray-50 pb-2 group">
                                        <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-purple-600 transition duration-300 text-right pr-4">Teléfono:</span>
                                        <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->telefono ?? 'No especificado' }}</span>
                                    </div>

                                    <div class="flex group">
                                        <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-purple-600 transition duration-300 text-right pr-4">Dirección:</span>
                                        <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->direccion }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Información Adicional -->
                            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition duration-300 border border-gray-100">
                                <h2 class="text-xl font-semibold text-gray-800 mb-5 flex items-center justify-center border-b pb-3 border-gray-100">
                                    <div class="p-2 bg-violet-100 rounded-lg mr-3">
                                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    Información Adicional
                                </h2>

                                <div class="space-y-4">
                                    <div class="flex border-b border-gray-50 pb-2 group">
                                        <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-violet-600 transition duration-300 text-right pr-4">Ocupación:</span>
                                        <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->ocupacion ?? 'No especificado' }}</span>
                                    </div>

                                    <div class="flex group">
                                        <span class="w-1/3 text-sm font-medium text-gray-500 group-hover:text-violet-600 transition duration-300 text-right pr-4">Ocupación Actual:</span>
                                        <span class="w-2/3 text-sm font-medium text-gray-900">{{ $paciente->ocupacion_actual ?? 'No especificado' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex justify-center space-x-4">
                        <a href="{{ route('perfil.editar') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-sm flex items-center transition-all duration-300 hover:translate-y-[-2px] focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                            Editar Perfil
                        </a>

                        <a href="{{ route('perfil.cambiar-password') }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-sm flex items-center transition-all duration-300 hover:translate-y-[-2px] focus:ring-2 focus:ring-purple-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Cambiar Contraseña
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
