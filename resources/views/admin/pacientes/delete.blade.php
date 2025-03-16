@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-50">
        <div class="w-full max-w-2xl">
            <!-- Tarjeta principal con efecto de profundidad -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
                <!-- Encabezado con gradiente y efecto de alerta -->
                <div class="relative bg-gradient-to-r from-red-500 to-pink-600 pt-12 pb-10 px-8">
                    <div class="absolute right-10 top-8">
                        <div class="animate__animated animate__pulse animate__infinite w-16 h-16 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class=" text-center text-3xl font-bold text-white tracking-tight">Eliminar Paciente</h2>
                    <div class="mt-2 flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-xl font-semibold text-white">{{ $paciente->nombres }} {{ $paciente->apellidos }}</p>
                            <p class="text-white/80 font-light text-sm">Cédula: {{ $paciente->cedula }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="p-8">
                    <!-- Mensaje de advertencia -->
                    <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Advertencia importante</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <p>Esta acción eliminará permanentemente al paciente y todos sus datos relacionados del sistema. Esta operación no se puede deshacer.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información del paciente -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2 mb-4">Información del Paciente</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm text-gray-500">Nombre Completo</span>
                                    <p class="font-medium text-gray-900">{{ $paciente->nombres }} {{ $paciente->apellidos }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm text-gray-500">Cédula</span>
                                    <p class="font-medium text-gray-900">{{ $paciente->cedula }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm text-gray-500">Fecha de Nacimiento</span>
                                    <p class="font-medium text-gray-900">{{ $paciente->fecha_nacimiento ? date('d/m/Y', strtotime($paciente->fecha_nacimiento)) : 'No registrada' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm text-gray-500">Teléfono</span>
                                    <p class="font-medium text-gray-900">{{ $paciente->telefono }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm text-gray-500">Correo Electrónico</span>
                                    <p class="font-medium text-gray-900">{{ $paciente->correo }}</p>
                                </div>
                            </div>

                            <div class="flex items-center md:col-span-2">
                                <div class="p-2 rounded-full bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm text-gray-500">Dirección</span>
                                    <p class="font-medium text-gray-900">{{ $paciente->direccion }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario para eliminar -->
                    <form id="eliminar-paciente-form" action="{{ url('/admin/pacientes', $paciente->id) }}" method="POST" class="mt-6">
                        @csrf
                        @method('DELETE')

                        <!-- Botones de acción -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ url('admin/pacientes') }}" class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-gray-700 bg-white rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-sm transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                <span>Cancelar</span>
                            </a>

                            <button type="button"
                                    onclick="confirmDelete()"
                                    id="delete-btn"
                                    class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-md transition-all duration-200">
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

    <!-- Modal de confirmación personalizado -->
    <div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden animate__animated animate__fadeIn">
        <!-- Overlay con efecto de desenfoque -->
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

        <!-- Contenido del modal -->
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-10 mx-4 overflow-hidden animate__animated animate__zoomIn animate__faster">
            <!-- Encabezado del modal -->
            <div class="bg-gradient-to-r from-red-600 to-red-700 p-6">
                <div class="flex items-center justify-center">
                    <div class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-white text-xl font-bold text-center mt-2">Confirmar Eliminación</h3>
            </div>

            <!-- Cuerpo del modal -->
            <div class="p-6">
                <p class="text-gray-700 text-center mb-6">¿Estás seguro de que deseas eliminar permanentemente a este paciente? Esta acción no se puede deshacer.</p>

                <!-- Información del paciente -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6 border border-gray-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-gray-500">Nombre:</span>
                        <span class="font-medium">{{ $paciente->nombres }} {{ $paciente->apellidos }}</span>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-gray-500">Cédula:</span>
                        <span class="font-medium">{{ $paciente->cedula }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Email:</span>
                        <span class="font-medium">{{ $paciente->correo }}</span>
                    </div>
                </div>

                <!-- Botones de acción del modal -->
                <div class="flex justify-center space-x-3">
                    <button type="button"
                            id="cancel-delete-btn"
                            class="flex-1 py-2.5 px-4 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-200">
                        Cancelar
                    </button>
                    <button type="button"
                            id="confirm-delete-btn"
                            class="flex-1 py-2.5 px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200 group">
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
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('delete-modal');
            const deleteBtn = document.getElementById('delete-btn');
            const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
            const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
            const deleteForm = document.getElementById('eliminar-paciente-form');
            const deleteBtnText = document.getElementById('delete-btn-text');
            const deleteBtnSpinner = document.getElementById('delete-btn-spinner');

            // Función para mostrar el modal
            function confirmDelete() {
                deleteModal.classList.remove('hidden');
                // Desactivamos el scroll
                document.body.style.overflow = 'hidden';
            }

            // Asignar la función al botón
            deleteBtn.addEventListener('click', confirmDelete);

            // Cerrar el modal
            cancelDeleteBtn.addEventListener('click', function() {
                deleteModal.classList.add('animate__fadeOut');
                setTimeout(() => {
                    deleteModal.classList.add('hidden');
                    deleteModal.classList.remove('animate__fadeOut');
                    // Reactivamos el scroll
                    document.body.style.overflow = 'auto';
                }, 300);
            });

            // Confirmar la eliminación
            confirmDeleteBtn.addEventListener('click', function() {
                // Mostrar spinner y deshabilitar botón
                deleteBtnText.classList.add('hidden');
                deleteBtnSpinner.classList.remove('hidden');
                confirmDeleteBtn.disabled = true;

                // Enviar formulario
                deleteForm.submit();
            });

            // También cerrar el modal si hacemos clic fuera de él
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    cancelDeleteBtn.click();
                }
            });

            // Permitir cerrar el modal con la tecla ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
                    cancelDeleteBtn.click();
                }
            });
        });
    </script>
@endsection
