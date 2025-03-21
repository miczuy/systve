@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-slate-50 to-cyan-50 p-4">
        <div class="w-full max-w-4xl mx-auto ">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-blue-100/40">
                <!-- Encabezado con nuevo diseño premium -->
                <div class="relative bg-gradient-to-r from-blue-600 via-indigo-500 to-blue-500 px-8 pt-8 pb-12 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-44 h-44 bg-blue-400/20 rounded-full"></div>
                        <div class="absolute left-10 bottom-0 w-24 h-24 bg-indigo-400/20 rounded-full"></div>
                        <div class="absolute right-20 bottom-10 w-16 h-16 bg-blue-300/30 rounded-full"></div>
                    </div>
                    <div class="relative flex flex-col items-center space-y-3 text-center">
                        <div class="p-3.5 bg-white/20 rounded-xl border border-white/40 shadow-lg inline-flex">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight drop-shadow-md">Editar Horario</h1>
                            <p class="mt-2 text-blue-50 text-sm sm:text-base font-light">Modifica la programación médica existente</p>
                        </div>
                    </div>
                </div>

                <!-- Formulario con nuevo diseño -->
                <form action="{{ route('admin.horarios.update', $horario->id) }}" method="POST" class="px-6 sm:px-10 py-8 space-y-7">
                    @csrf
                    @method('PUT')

                    @if(session('mensaje'))
                        <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-lg flex items-center space-x-3 animate-fade-in shadow-sm">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-medium">{{ session('mensaje') }}</span>
                        </div>
                    @endif

                    <div class="space-y-7">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Campo Día -->
                            <div class="space-y-1.5 group">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5 ml-1 flex items-center group-hover:text-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Día de atención
                                </label>
                                <select name="dia" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-300/20 transition-all duration-300 text-gray-700 text-sm shadow-sm">
                                    <option value="LUNES" {{ $horario->dia == 'LUNES' ? 'selected' : '' }}>LUNES</option>
                                    <option value="MARTES" {{ $horario->dia == 'MARTES' ? 'selected' : '' }}>MARTES</option>
                                    <option value="MIERCOLES" {{ $horario->dia == 'MIERCOLES' ? 'selected' : '' }}>MIÉRCOLES</option>
                                    <option value="JUEVES" {{ $horario->dia == 'JUEVES' ? 'selected' : '' }}>JUEVES</option>
                                    <option value="VIERNES" {{ $horario->dia == 'VIERNES' ? 'selected' : '' }}>VIERNES</option>
                                    <option value="SABADO" {{ $horario->dia == 'SABADO' ? 'selected' : '' }}>SÁBADO</option>
                                    <option value="DOMINGO" {{ $horario->dia == 'DOMINGO' ? 'selected' : '' }}>DOMINGO</option>
                                </select>
                            </div>

                            <!-- Campo Consultorio -->
                            <div class="space-y-1.5 group">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5 ml-1 flex items-center group-hover:text-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Consultorio
                                </label>
                                <select name="consultorio_id" id="consultorio_select" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-300/20 transition-all duration-300 text-gray-700 text-sm shadow-sm">
                                    <option value="">Seleccione un consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}" {{ $horario->consultorio_id == $consultorio->id ? 'selected' : '' }}>{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo Doctor -->
                            <div class="space-y-1.5 group">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5 ml-1 flex items-center group-hover:text-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Médico responsable
                                </label>
                                <select name="doctor_id" id="doctor_id" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-300/20 transition-all duration-300 text-gray-700 text-sm shadow-sm">
                                    <option value="">Seleccione un doctor</option>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}" {{ $horario->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->nombres }} {{ $doctor->apellidos }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo Especialidad -->
                            <div class="space-y-1.5 group">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5 ml-1 flex items-center group-hover:text-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Especialidad médica
                                </label>
                                <select name="especialidad" id="especialidad" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-300/20 transition-all duration-300 text-gray-700 text-sm shadow-sm">
                                    <option value="">Seleccione especialidad</option>
                                </select>
                            </div>

                            <!-- Hora Inicio -->
                            <div class="space-y-1.5 group">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5 ml-1 flex items-center group-hover:text-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Hora de inicio
                                </label>
                                <input type="text" name="hora_inicio" id="hora_inicio" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-300/20 transition-all duration-300 text-gray-700 text-sm shadow-sm" required placeholder="Seleccione hora inicio">
                            </div>

                            <!-- Hora Final -->
                            <div class="space-y-1.5 group">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5 ml-1 flex items-center group-hover:text-blue-600 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0zM9 12l2 2 4-4"/>
                                    </svg>
                                    Hora de finalización
                                </label>
                                <input type="text" name="hora_fin" id="hora_final" class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-300/20 transition-all duration-300 text-gray-700 text-sm shadow-sm" required placeholder="Seleccione hora final">
                            </div>
                        </div>

                        <!-- Botones con mejor estilo -->
                        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 mt-8 pt-5 border-t border-gray-100">
                            <a href="{{ url('admin/horarios') }}" class="px-6 py-3 border border-gray-300 text-gray-600 rounded-xl hover:bg-gray-50 transition-all duration-300 flex items-center justify-center space-x-2 text-sm font-medium">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span>Cancelar</span>
                            </a>
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-500 text-white rounded-xl hover:shadow-lg hover:shadow-blue-500/20 transition-all duration-300 flex items-center justify-center space-x-2 text-sm font-medium">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Actualizar Horario</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Consultorio mejorado con tamaño automático -->
    <div id="consultorioModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black/60 p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-6 w-auto min-w-[300px] transform transition-all duration-300 scale-95 opacity-0 animate-modal-show border border-blue-100/30 relative max-h-[90vh] overflow-y-auto">
            <!-- Elemento decorativo -->
            <div class="absolute -top-14 -right-14 w-28 h-28 bg-blue-500/10 rounded-full"></div>
            <div class="absolute -bottom-14 -left-14 w-28 h-28 bg-indigo-500/10 rounded-full"></div>

            <div class="sticky top-0 bg-white pb-4 z-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-500">
                        Información del Consultorio
                    </span>
                </h2>
                <div class="w-28 h-1 bg-gradient-to-r from-blue-500 to-indigo-400 rounded-full mx-auto mb-4"></div>
            </div>

            <div id="consultorio_info" class="space-y-4 text-gray-600 px-2 relative z-10">
                <!-- Contenido dinámico aquí -->
            </div>

            <div class="sticky bottom-0 bg-gradient-to-t from-white via-white to-transparent pt-4 mt-6">
                <div class="flex justify-center">
                    <button id="closeModal" class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-500 text-white rounded-xl hover:shadow-md hover:shadow-blue-500/20 transition-all duration-300 font-medium text-sm">
                        Cerrar Ventana
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes modal-show {
            from { transform: scale(0.95) translateY(10px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }
        .animate-modal-show {
            animation: modal-show 0.3s ease-out forwards;
        }

        /* Scroll personalizado */
        .overflow-y-auto::-webkit-scrollbar {
            width: 5px;
        }
        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Estilos para campos cuando tienen hover o focus */
        select:hover, input:hover {
            border-color: #3b82f6;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            const modal = $('#consultorioModal');
            const modalContent = modal.find('.bg-white');

            // Función para convertir el formato de hora de 24h a 12h
            function formatTime24To12(time24) {
                if (!time24) return '';

                try {
                    // Dividir la hora en horas y minutos
                    const [hours, minutes] = time24.split(':');
                    const h = parseInt(hours);

                    // Determinar AM o PM
                    const period = h >= 12 ? 'PM' : 'AM';

                    // Convertir a formato 12 horas (1-12)
                    const h12 = h % 12 || 12;

                    return `${h12}:${minutes} ${period}`;
                } catch (e) {
                    console.error('Error al formatear la hora:', e);
                    return time24; // Devolver la hora original si hay error
                }
            }

            $('#consultorio_select').on('change', function() {
                const consultorio_id = $(this).val();
                if (consultorio_id) {
                    let url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
                    url = url.replace(':id', consultorio_id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#consultorio_info').html(data);
                            modal.removeClass('hidden');
                            setTimeout(() => {
                                modalContent.removeClass('scale-95 opacity-0');
                            }, 10);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error al obtener los datos del consultorio:', textStatus, errorThrown);
                            alert('Error al obtener los datos del consultorio. Por favor, inténtelo de nuevo más tarde.');
                        }
                    });
                } else {
                    $('#consultorio_info').html('');
                }
            });

            $('#closeModal').on('click', function() {
                modalContent.addClass('scale-95 opacity-0');
                setTimeout(() => {
                    modal.addClass('hidden');
                }, 300);
            });

            // Formatear las horas del horario actual para Flatpickr
            const horaInicio12h = formatTime24To12("{{ $horario->hora_inicio }}");
            const horaFin12h = formatTime24To12("{{ $horario->hora_fin }}");

            // Configurar Flatpickr para hora de inicio
            flatpickr("#hora_inicio", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K", // Esto genera formato 12h con AM/PM
                time_24hr: false,
                static: true,
                defaultDate: horaInicio12h,
                minuteIncrement: 60
            });

            // Configurar Flatpickr para hora final
            flatpickr("#hora_final", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                time_24hr: false,
                static: true,
                defaultDate: horaFin12h,
                minuteIncrement: 60 // Intervalo de 1 hora
            });

            // Carga de especialidades
            const doctores = @json($doctores);
            const doctorSelect = document.getElementById('doctor_id');
            const especialidadSelect = document.getElementById('especialidad');

            // Cargar especialidades al inicio para el doctor seleccionado
            cargarEspecialidades();

            doctorSelect.addEventListener('change', function() {
                cargarEspecialidades();
            });

            function cargarEspecialidades() {
                const doctorId = parseInt(doctorSelect.value);
                const doctor = doctores.find(d => d.id === doctorId);
                especialidadSelect.innerHTML = '<option value="">Seleccione especialidad</option>';

                if (doctor && doctor.specialties) {
                    doctor.specialties.forEach(specialty => {
                        const option = document.createElement('option');
                        option.value = specialty.id;
                        option.textContent = specialty.nombre.toUpperCase();
                        especialidadSelect.appendChild(option);
                    });
                }
            }
        });
    </script>
@endsection
