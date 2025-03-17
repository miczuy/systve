@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="w-full max-w-2xl">
            <!-- Tarjeta principal con efecto de profundidad mejorado -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
                <!-- Encabezado con diseño mejorado -->
                <div class="relative bg-gradient-to-r from-purple-600 to-indigo-600 pt-16 pb-12 px-8">
                    <div class="absolute right-8 top-8">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-center text-4xl font-bold text-white tracking-tight">Eliminar Mascota</h2>
                    <div class="mt-6 flex items-center bg-white/10 backdrop-blur-md p-4 rounded-2xl">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-2xl font-semibold text-white">{{ $mascota->nombre }}</p>
                            <p class="text-white/80 font-medium text-sm mt-1">{{ $mascota->especie }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal con diseño mejorado -->
                <div class="p-8">
                    <!-- Mensaje de advertencia mejorado -->
                    <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-6 rounded-xl shadow-sm">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-100 p-2 rounded-lg">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-red-800">Advertencia importante</h3>
                                <div class="mt-2 text-sm text-red-700 leading-relaxed">
                                    <p>Esta acción eliminará permanentemente a la mascota y todos sus datos relacionados del sistema. Esta operación no se puede deshacer.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de la mascota mejorada -->
                    <div class="mb-8 bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Información de la Mascota</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Campos de información mejorados -->
                            @foreach([
                                ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'label' => 'Nombre', 'value' => $mascota->nombre],
                                ['icon' => 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2', 'label' => 'Especie', 'value' => $mascota->especie],
                                ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'label' => 'Dueño', 'value' => $mascota->paciente->nombres.' '.$mascota->paciente->apellidos],
                                ['icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'label' => 'Fecha de Nacimiento', 'value' => $mascota->fecha_nacimiento ? date('d/m/Y', strtotime($mascota->fecha_nacimiento)) : 'No registrada']
                            ] as $field)
                                <div class="flex items-center bg-white p-4 rounded-xl shadow-sm">
                                    <div class="p-3 rounded-xl bg-indigo-50">
                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $field['icon'] }}"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <span class="text-sm text-gray-500">{{ $field['label'] }}</span>
                                        <p class="font-medium text-gray-900">{{ $field['value'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Formulario para eliminar -->
                    <form id="eliminar-mascota-form" action="{{ route('admin.mascotas.destroy', $mascota) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <!-- Botones de acción mejorados -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('admin.mascotas.show', $mascota) }}"
                               class="inline-flex items-center px-6 py-3 border-2 border-gray-300 text-gray-700 bg-white rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-sm transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                <span>Cancelar</span>
                            </a>

                            <button type="button"
                                    onclick="confirmDelete()"
                                    id="delete-btn"
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-md transition-all duration-200">
                                <svg class="w-5 h-5 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span>Eliminar Permanentemente</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación mejorado -->
    <div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden animate__animated animate__fadeIn">
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-10 mx-4 overflow-hidden animate__animated animate__zoomIn animate__faster">
            <div class="bg-gradient-to-r from-red-600 to-red-700 p-8">
                <div class="flex items-center justify-center">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-white text-2xl font-bold text-center">Confirmar Eliminación</h3>
            </div>

            <div class="p-8">
                <p class="text-gray-700 text-center mb-6 text-lg">¿Estás seguro de que deseas eliminar permanentemente a esta mascota?</p>

                <div class="bg-gray-50 rounded-xl p-6 mb-8 border border-gray-200">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Nombre:</span>
                            <span class="font-semibold text-gray-900">{{ $mascota->nombre }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Especie:</span>
                            <span class="font-semibold text-gray-900">{{ $mascota->especie }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Dueño:</span>
                            <span class="font-semibold text-gray-900">{{ $mascota->paciente->nombres }} {{ $mascota->paciente->apellidos }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center space-x-4">
                    <button type="button"
                            id="cancel-delete-btn"
                            class="flex-1 py-3 px-6 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-200 font-medium">
                        Cancelar
                    </button>
                    <button type="button"
                            id="confirm-delete-btn"
                            class="flex-1 py-3 px-6 bg-red-600 text-white rounded-xl hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200 font-medium">
                        <span class="flex items-center justify-center">
                            <span id="delete-btn-text">Sí, eliminar</span>
                            <span id="delete-btn-spinner" class="hidden">
                                <svg class="animate-spin ml-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // El script se mantiene igual que en tu código original
    </script>
@endsection
