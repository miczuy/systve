@extends('layouts.admin')

@section('content')
    <!-- Fondo con patrón de ondas -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50 py-12 px-4 sm:px-6 md:py-16 lg:py-20 flex items-center justify-center relative overflow-hidden">
        <!-- Elementos decorativos de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-10 left-10 w-72 h-72 bg-cyan-300/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-400/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/4 right-1/4 w-40 h-40 bg-indigo-300/10 rounded-full blur-2xl"></div>
            <svg class="absolute bottom-0 left-0 text-blue-500/5 w-full h-32" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path fill="currentColor" d="M0,224L60,229.3C120,235,240,245,360,234.7C480,224,600,192,720,192C840,192,960,224,1080,218.7C1200,213,1320,171,1380,149.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>

        <div class="w-full max-w-5xl mx-auto relative z-10">
            <!-- Tarjeta principal con sombra mejorada -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-[0_20px_50px_rgba(8,145,178,0.1)] overflow-hidden transition-all duration-300 hover:shadow-[0_25px_60px_rgba(8,145,178,0.15)] border border-white">
                <!-- Encabezado con efecto de iluminación -->
                <div class="relative bg-gradient-to-r from-cyan-600 via-blue-600 to-cyan-600 px-6 sm:px-10 pt-10 pb-14 overflow-hidden">
                    <div class="absolute inset-0 bg-pattern opacity-10"></div>

                    <!-- Efectos de luz -->
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-32 bg-gradient-to-r from-transparent via-white/10 to-transparent rotate-12"></div>

                    <div class="relative flex flex-col items-center space-y-5 text-center">
                        <div class="p-4 bg-white/20 rounded-xl backdrop-blur-sm border border-white/30 shadow-lg transform transition-transform hover:scale-105 duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0zM12 6v.01M16.5 6v.01M7.5 6v.01"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight drop-shadow-md">Programación Médica</h1>
                            <p class="mt-2 text-blue-100 font-light text-base sm:text-lg max-w-md mx-auto">Gestión eficiente de horarios de atención</p>
                        </div>

                        <!-- Indicador de navegación de pasos -->
                        <div class="flex space-x-1 mt-4">
                            <span class="w-8 h-1.5 bg-white/90 rounded-full"></span>
                            <span class="w-2 h-1.5 bg-white/40 rounded-full"></span>
                            <span class="w-2 h-1.5 bg-white/40 rounded-full"></span>
                        </div>
                    </div>
                </div>

                <!-- Formulario con efectos de profundidad -->
                <form action="{{ url('/admin/horarios/create') }}" method="POST" class="px-6 sm:px-10 py-10 space-y-8 bg-gradient-to-b from-white to-slate-50/80">
                    @csrf

                    @if(session('error'))
                        <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-center space-x-3 animate-fadeIn shadow-sm">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-medium text-sm">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="space-y-8">
                        <!-- Título de sección -->
                        <div class="border-b border-slate-200 pb-2">
                            <h2 class="text-xl font-semibold text-slate-800">Información del Horario</h2>
                            <p class="text-slate-500 text-sm">Complete todos los campos para programar una nueva cita médica</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Campo Día con iluminación de hover -->
                            <div class="space-y-2 relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition duration-300"></div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5 ml-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        Día de atención
                                    </label>
                                    <select name="dia" class="w-full px-4 py-3.5 bg-white rounded-lg border border-slate-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 shadow-sm text-slate-700">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIÉRCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SABADO">SÁBADO</option>
                                        <option value="DOMINGO">DOMINGO</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo Consultorio con iluminación de hover -->
                            <div class="space-y-2 relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition duration-300"></div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5 ml-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        Consultorio
                                    </label>
                                    <select name="consultorio_id" id="consultorio_select" class="w-full px-4 py-3.5 bg-white rounded-lg border border-slate-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 shadow-sm text-slate-700 hover:border-cyan-300">
                                        <option value="">Seleccione un consultorio</option>
                                        @foreach($consultorios as $consultorio)
                                            <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Tooltip de ayuda -->
                                    <div class="absolute right-2 top-1.5 cursor-help group">
                                        <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div class="absolute bottom-full right-0 mb-2 w-48 p-2 bg-cyan-600 text-white text-xs rounded shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                            Seleccione para ver detalles del consultorio
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Campo Doctor con iluminación de hover -->
                            <div class="space-y-2 relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition duration-300"></div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5 ml-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Médico responsable
                                    </label>
                                    <select name="doctor_id" id="doctor_id" class="w-full px-4 py-3.5 bg-white rounded-lg border border-slate-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 shadow-sm text-slate-700 hover:border-cyan-300">
                                        <option value="">Seleccione un doctor</option>
                                        @foreach($doctores as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->nombres }} {{ $doctor->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Campo Especialidad con iluminación de hover -->
                            <div class="space-y-2 relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition duration-300"></div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5 ml-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Especialidad médica
                                    </label>
                                    <select name="especialidad" id="especialidad" class="w-full px-4 py-3.5 bg-white rounded-lg border border-slate-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 shadow-sm text-slate-700 hover:border-cyan-300">
                                        <option value="">Seleccione especialidad</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Título de subsección -->
                            <div class="col-span-1 sm:col-span-2 mt-2 border-b border-slate-200 pb-1">
                                <h3 class="text-md font-medium text-slate-700">Horario de Atención</h3>
                            </div>

                            <!-- Hora Inicio con iluminación de hover -->
                            <div class="space-y-2 relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition duration-300"></div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5 ml-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Hora de inicio
                                    </label>
                                    <input type="text" name="hora_inicio" id="hora_inicio" class="w-full px-4 py-3.5 bg-white rounded-lg border border-slate-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 shadow-sm text-slate-700 hover:border-cyan-300" required placeholder="Seleccione hora inicio">
                                </div>
                            </div>

                            <!-- Hora Final con iluminación de hover -->
                            <div class="space-y-2 relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition duration-300"></div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5 ml-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0zM9 12l2 2 4-4"/>
                                        </svg>
                                        Hora de finalización
                                    </label>
                                    <input type="text" name="hora_fin" id="hora_final" class="w-full px-4 py-3.5 bg-white rounded-lg border border-slate-200 focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 shadow-sm text-slate-700 hover:border-cyan-300" required placeholder="Seleccione hora final">
                                </div>
                            </div>
                        </div>

                        <!-- Botones con efecto de elevación -->
                        <div class="flex flex-col sm:flex-row sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 mt-10 pt-6 border-t border-slate-200">
                            <a href="{{ url('admin') }}" class="group px-6 py-3 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-all duration-200 flex items-center justify-center space-x-2 font-medium shadow-sm hover:shadow relative overflow-hidden">
                                <span class="absolute inset-0 w-0 bg-slate-100 transition-all duration-300 ease-out group-hover:w-full"></span>
                                <svg class="w-4 h-4 text-slate-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span class="relative z-10">Cancelar</span>
                            </a>
                            <button type="submit" class="group px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all duration-200 flex items-center justify-center space-x-2 font-medium hover:shadow-cyan-100 hover:scale-[1.01] active:scale-[0.98] relative overflow-hidden">
                                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-out"></span>
                                <svg class="w-4 h-4 text-white/90 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="relative z-10">Confirmar Horario</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Indicador de ayuda mejorado con pulso -->
            <div class="mt-6 text-center">
                <div class="inline-flex items-center px-4 py-2 bg-cyan-50 border border-cyan-100 rounded-full text-sm text-cyan-700 shadow-sm">
                    <span class="relative flex h-3 w-3 mr-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-cyan-500"></span>
                    </span>
                    Seleccione un consultorio para ver información detallada
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Avanzado -->
    <div id="consultorioModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black/60 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden transform transition-all duration-300 scale-90 opacity-0 animate-modal-show border border-blue-100/30 relative">
            <!-- Decoración de esquinas -->
            <div class="absolute top-0 left-0 w-16 h-16 border-t-4 border-l-4 border-cyan-500/30 rounded-tl-2xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-0 w-16 h-16 border-b-4 border-r-4 border-cyan-500/30 rounded-br-2xl pointer-events-none"></div>

            <!-- Encabezado modal con iluminación -->
            <div class="relative bg-gradient-to-r from-cyan-600 to-blue-600 px-8 py-6 rounded-t-2xl">
                <div class="absolute inset-0 bg-pattern opacity-10 rounded-t-2xl"></div>
                <div class="absolute -top-20 -left-20 w-40 h-40 bg-white/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-5 right-0 w-full h-10 bg-gradient-to-r from-transparent via-white/10 to-transparent rotate-6"></div>

                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-1 relative z-10 tracking-tight">
                            Información del Consultorio
                        </h2>
                        <p class="text-blue-100/80 text-sm">Detalles completos y disponibilidad</p>
                    </div>
                    <button id="closeModalX" class="text-white/70 hover:text-white transition-colors duration-200 p-1 rounded-full hover:bg-white/10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Contenido del modal con scroll interno -->
            <div class="overflow-y-auto max-h-[60vh]">
                <div id="consultorio_info" class="p-8 space-y-6 text-slate-700">
                    <!-- Contenido dinámico aquí -->
                    <div class="animate-pulse">
                        <div class="h-4 bg-slate-200 rounded w-3/4 mb-6"></div>
                        <div class="flex space-x-4 mb-8">
                            <div class="h-12 w-12 bg-slate-200 rounded-full"></div>
                            <div class="flex-1 space-y-3 py-1">
                                <div class="h-4 bg-slate-200 rounded w-1/2"></div>
                                <div class="h-4 bg-slate-200 rounded w-5/6"></div>
                            </div>
                        </div>
                        <div class="h-10 bg-slate-200 rounded-lg w-full mb-6"></div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="h-24 bg-slate-200 rounded-lg"></div>
                            <div class="h-24 bg-slate-200 rounded-lg"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie del modal con efecto de sombra y degradado -->
            <div class="sticky bottom-0 bg-gradient-to-t from-white via-white/95 to-transparent pt-6 px-8 pb-8">
                <button id="closeModal" class="w-full px-6 py-3.5 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all duration-300 font-medium shadow-md shadow-blue-500/10 relative overflow-hidden group">
                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-out"></span>
                    <span class="relative z-10">Cerrar Ventana</span>
                </button>
            </div>
        </div>
    </div>

    <style>
        @keyframes modal-show {
            from { transform: scale(0.95) translateY(10px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }
        .animate-modal-show {
            animation: modal-show 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Scroll personalizado */
        .overflow-y-auto::-webkit-scrollbar {
            width: 8px;
        }
        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Patrón de fondo */
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Efecto de focus en inputs */
        input:focus, select:focus {
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.2);
        }

        /* Efecto de iluminación en hover para elementos interactivos */
        .hover-glow:hover {
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script>
        $(document).ready(function() {
            const modal = $('#consultorioModal');
            const modalContent = modal.find('.bg-white');

            $('#consultorio_select').on('change', function() {
                const consultorio_id = $(this).val();
                if (consultorio_id) {
                    let url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
                    url = url.replace(':id', consultorio_id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        beforeSend: function() {
                            // Esqueleto de carga mejorado
                            $('#consultorio_info').html(`
                                <div class="animate-pulse space-y-6">
                                    <div class="h-6 bg-slate-200 rounded-lg w-3/4 mb-8"></div>

                                    <div class="flex space-x-4 mb-8">
                                        <div class="h-12 w-12 bg-slate-200 rounded-full"></div>
                                        <div class="flex-1 space-y-3 py-1">
                                            <div class="h-4 bg-slate-200 rounded w-1/2"></div>
                                            <div class="h-4 bg-slate-200 rounded w-5/6"></div>
                                        </div>
                                    </div>

                                    <div class="p-4 bg-slate-100 rounded-lg space-y-3">
                                        <div class="h-4 bg-slate-200 rounded w-3/4"></div>
                                        <div class="h-4 bg-slate-200 rounded w-1/2"></div>
                                        <div class="h-4 bg-slate-200 rounded w-5/6"></div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mt-6">
                                        <div>
                                            <div class="h-5 bg-slate-200 rounded w-1/2 mb-3"></div>
                                            <div class="h-20 bg-slate-200 rounded-lg"></div>
                                        </div>
                                        <div>
                                            <div class="h-5 bg-slate-200 rounded w-1/2 mb-3"></div>
                                            <div class="h-20 bg-slate-200 rounded-lg"></div>
                                        </div>
                                    </div>
                                </div>
                            `);

                            modal.removeClass('hidden');
                            setTimeout(() => {
                                modalContent.removeClass('scale-90 opacity-0');
                            }, 10);
                        },
                        success: function(data) {
                            // Pequeña pausa para mostrar la animación
                            setTimeout(() => {
                                $('#consultorio_info').html(data);

                                // Animación de entrada para el contenido
                                $('#consultorio_info > *').each(function(index) {
                                    $(this).css({
                                        'opacity': '0',
                                        'transform': 'translateY(10px)'
                                    });

                                    setTimeout(() => {
                                        $(this).css({
                                            'transition': 'all 0.3s ease',
                                            'opacity': '1',
                                            'transform': 'translateY(0)'
                                        });
                                    }, 50 * index);
                                });
                            }, 500);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error al obtener los datos del consultorio:', textStatus, errorThrown);
                            $('#consultorio_info').html(`
                                <div class="text-center py-8">
                                    <div class="bg-rose-50 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-slate-800 mb-2">Error al cargar los datos</h3>
                                    <p class="text-slate-600 mb-6">No pudimos obtener la información del consultorio. Por favor, inténtelo de nuevo más tarde.</p>
                                    <button class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition-colors" onclick="$('#closeModal').click()">Volver al formulario</button>
                                </div>
                            `);
                        }
                    });
                } else {
                    $('#consultorio_info').html('');
                }
            });

            // Cerrar con botón normal
            $('#closeModal').on('click', function() {
                closeModalWithAnimation();
            });

            // Cerrar con botón X
            $('#closeModalX').on('click', function() {
                closeModalWithAnimation();
            });

            // También cerrar con overlay
            modal.on('click', function(e) {
                if (e.target === this) {
                    closeModalWithAnimation();
                }
            });

            function closeModalWithAnimation() {
                modalContent.addClass('scale-90 opacity-0');
                setTimeout(() => {
                    modal.addClass('hidden');
                }, 300);
            }

            // Flatpickr con tema personalizado
            flatpickr("#hora_inicio", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                time_24hr: false,
                static: true,
                placeholder: "Seleccione hora inicio",
                minuteIncrement: 60, // Intervalo de 1 hora
                disableMobile: "true",
                theme: "material_blue"
            });

            flatpickr("#hora_final", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                time_24hr: false,
                static: true,
                placeholder: "Seleccione hora final",
                minuteIncrement: 60, // Intervalo de 1 hora
                disableMobile: "true",
                theme: "material_blue"
            });

            // Carga de especialidades con efecto visual y animación
            const doctores = @json($doctores);
            const doctorSelect = document.getElementById('doctor_id');
            const especialidadSelect = document.getElementById('especialidad');

            doctorSelect.addEventListener('change', function() {
                const doctorId = parseInt(this.value);
                const doctor = doctores.find(d => d.id === doctorId);

                // Efecto visual de actualización con animación
                especialidadSelect.classList.add('opacity-50');

                setTimeout(() => {
                    especialidadSelect.innerHTML = '<option value="">Seleccione especialidad</option>';

                    if (doctor && doctor.specialties) {
                        doctor.specialties.forEach((specialty, index) => {
                            setTimeout(() => {
                                const option = document.createElement('option');
                                option.value = specialty.id;
                                option.textContent = specialty.nombre.toUpperCase();
                                especialidadSelect.appendChild(option);
                            }, 50 * index);
                        });
                    }

                    setTimeout(() => {
                        especialidadSelect.classList.remove('opacity-50');
                    }, 300);
                }, 300);
            });

            // Agregar efectos de focus y hover a todos los campos
            const formInputs = document.querySelectorAll('input, select');
            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.classList.add('hover-glow');
                });
                input.addEventListener('blur', function() {
                    this.parentElement.parentElement.classList.remove('hover-glow');
                });
            });
        });
    </script>

    <!-- Estilos adicionales para Flatpickr -->
    <style>
        .flatpickr-calendar.material_blue {
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            border-radius: 12px;
            border: none;
            background: #fff;
        }
        .flatpickr-calendar.material_blue .flatpickr-time {
            border-top: 1px solid #e6e6e6;
        }
        .flatpickr-calendar.material_blue .flatpickr-time .numInputWrapper:hover,
        .flatpickr-calendar.material_blue .flatpickr-hour:focus,
        .flatpickr-calendar.material_blue .flatpickr-minute:focus {
            background: #f1f5f9;
        }
        .flatpickr-calendar.material_blue .flatpickr-am-pm:hover,
        .flatpickr-calendar.material_blue .flatpickr-am-pm:focus {
            background: #f1f5f9;
        }
        .flatpickr-calendar.material_blue .numInputWrapper span.arrowUp:after {
            border-bottom-color: #0891b2;
        }
        .flatpickr-calendar.material_blue .numInputWrapper span.arrowDown:after {
            border-top-color: #0891b2;
        }
        .flatpickr-calendar.material_blue .flatpickr-time input:hover,
        .flatpickr-calendar.material_blue .flatpickr-time .flatpickr-am-pm:hover {
            background: #e6f7fa;
        }
        .flatpickr-calendar.material_blue .flatpickr-time .flatpickr-time-separator {
            color: #0891b2;
        }
        /* Efecto de animación en flechas de tiempo */
        .flatpickr-calendar .arrowUp:hover, .flatpickr-calendar .arrowDown:hover {
            transform: scale(1.2);
        }
    </style>
@endsection
