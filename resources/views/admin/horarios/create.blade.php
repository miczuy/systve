@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-60 ">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl group border border-white/20">
                <!-- Encabezado -->
                <div class="relative bg-gradient-to-r from-cyan-600 to-blue-700 px-10 pt-8 pb-12 overflow-hidden">
                    <div class="absolute inset-0 bg-medical-pattern opacity-10"></div>
                    <div class="relative flex flex-col items-center space-y-4 text-center">
                        <div class="p-4 bg-white/20 rounded-2xl backdrop-blur-sm border-2 border-white/30 shadow-lg">
                            <svg class="w-10 h-10 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0zM12 6v.01M16.5 6v.01M7.5 6v.01"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-white tracking-tight font-playfair drop-shadow-md">Programación Médica</h1>
                            <p class="mt-2 text-blue-100/90 font-light text-lg">Selección precisa de horarios de atención</p>
                        </div>
                    </div>
                </div>

                <!-- Formulario -->
                <form action="{{ url('/admin/horarios/create') }}" method="POST" class="px-10 py-8 space-y-8">
                    @csrf

                    @if(session('error'))
                        <div class="bg-rose-100/90 border-l-4 border-rose-500 text-rose-700 p-4 rounded-xl flex items-center space-x-3 animate-fade-in shadow-md">
                            <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Campo Día -->
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Día de atención
                                </label>
                                <select name="dia" class="w-full px-5 py-3.5 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 transition-all duration-200 shadow-sm font-medium text-slate-700">
                                    <option value="LUNES">LUNES</option>
                                    <option value="MARTES">MARTES</option>
                                    <option value="MIERCOLES">MIÉRCOLES</option>
                                    <option value="JUEVES">JUEVES</option>
                                    <option value="VIERNES">VIERNES</option>
                                    <option value="SABADO">SÁBADO</option>
                                    <option value="DOMINGO">DOMINGO</option>
                                </select>
                            </div>

                            <!-- Campo Consultorio -->
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Consultorio
                                </label>
                                <select name="consultorio_id" id="consultorio_select" class="w-full px-5 py-3.5 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 transition-all duration-200 shadow-sm">
                                    <option value="">Seleccione un consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}" class="font-medium">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo Doctor -->
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Médico responsable
                                </label>
                                <select name="doctor_id" id="doctor_id" class="w-full px-5 py-3.5 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 transition-all duration-200 shadow-sm">
                                    <option value="">Seleccione un doctor</option>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}" class="font-medium">{{ $doctor->nombres }} {{ $doctor->apellidos }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo Especialidad -->
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Especialidad médica
                                </label>
                                <select name="especialidad" id="especialidad" class="w-full px-5 py-3.5 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 transition-all duration-200 shadow-sm">
                                    <option value="">Seleccione especialidad</option>
                                </select>
                            </div>

                            <!-- Hora Inicio -->
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Hora de inicio
                                </label>
                                <input type="text" name="hora_inicio" id="hora_inicio" class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white placeholder-slate-400/60 transition-all duration-200 shadow-sm font-medium" required placeholder="Seleccione hora inicio">
                            </div>

                            <!-- Hora Final -->
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0zM9 12l2 2 4-4"/>
                                    </svg>
                                    Hora de finalización
                                </label>
                                <input type="text" name="hora_fin" id="hora_final" class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white placeholder-slate-400/60 transition-all duration-200 shadow-sm font-medium" required placeholder="Seleccione hora final">
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-3 mt-8">
                            <a href="{{ url('admin') }}" class="px-6 py-3.5 border-2 border-slate-200/80 text-slate-600 rounded-xl hover:bg-slate-50/50 transition-all duration-300 flex items-center space-x-2 group hover:shadow-sm">
                                <svg class="w-5 h-5 text-slate-500 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span class="font-medium">Cancelar</span>
                            </a>
                            <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-cyan-600 to-blue-600 text-white rounded-xl hover:shadow-lg transition-all duration-300 flex items-center space-x-2 group hover:scale-[1.02]">
                                <svg class="w-6 h-6 text-white/80 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="font-medium">Confirmar Horario</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Completo -->
    <div id="consultorioModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black/30 backdrop-blur-sm p-4">
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-2xl p-8 w-full max-w-[90vw] md:max-w-[70vw] lg:max-w-[60vw] xl:max-w-[50vw]  overflow-y-auto transform transition-all duration-300 scale-90 opacity-0 animate-modal-show border border-blue-100/30 relative">
            <!-- Decoración de esquina -->
            <div class="absolute top-0 left-0 w-16 h-16 border-t-4 border-l-4 border-cyan-500/30 rounded-tl-2xl"></div>
            <div class="absolute bottom-0 right-0 w-16 h-16 border-b-4 border-r-4 border-cyan-500/30 rounded-br-2xl"></div>

            <div class="sticky top-0 bg-white/80 backdrop-blur-sm pb-6 z-10">
                <h2 class="text-4xl font-bold text-slate-800 mb-2 text-center font-playfair tracking-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-blue-600">
                    Información del Consultorio
                </span>
                </h2>
                <div class="w-32 h-1.5 bg-gradient-to-r from-cyan-400 to-blue-400 rounded-full mx-auto mb-6 shadow-sm"></div>
            </div>

            <div id="consultorio_info" class="space-y-6 text-slate-600/90 px-4 lg:px-8">
                <!-- Contenido dinámico aquí -->
            </div>

            <div class="sticky bottom-0 bg-gradient-to-t from-white via-white/90 to-transparent pt-8 mt-8">
                <div class="flex justify-center">
                    <button id="closeModal" class="px-10 py-4 bg-gradient-to-br from-cyan-500 to-blue-600 text-white rounded-xl hover:shadow-xl transition-all duration-300 hover:scale-[1.02] hover:brightness-110 active:scale-95 font-semibold tracking-wide shadow-md shadow-cyan-100/50">
                        Cerrar Ventana
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes modal-show {
            from { transform: scale(0.98) translateY(10px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }
        .animate-modal-show {
            animation: modal-show 0.4s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        /* Mejoras para móviles */
        @media (max-width: 640px) {
            #consultorioModal {
                padding: 1rem;
            }
            #consultorioModal .bg-white {
                max-width: 95vw;
                height: 85vh;
                padding: 1.5rem;
            }
            .font-playfair {
                font-size: 1.75rem;
            }
        }

        /* Efectos de hover para elementos interactivos */
        select:hover, input:hover {
            border-color: #06b6d4 !important;
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
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
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

// Flatpickr para hora de inicio
            flatpickr("#hora_inicio", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                time_24hr: false,
                static: true,
                placeholder: "Seleccione hora inicio",
                theme: "light_rounded",
                minuteIncrement: 60 // Intervalo de 1 hora
            });

// Flatpickr para hora final
            flatpickr("#hora_final", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                time_24hr: false,
                static: true,
                placeholder: "Seleccione hora final",
                theme: "light_rounded",
                minuteIncrement: 60 // Intervalo de 1 hora
            });

            // Carga de especialidades
            const doctores = @json($doctores);
            const doctorSelect = document.getElementById('doctor_id');
            const especialidadSelect = document.getElementById('especialidad');

            doctorSelect.addEventListener('change', function() {
                const doctorId = parseInt(this.value);
                const doctor = doctores.find(d => d.id === doctorId);
                especialidadSelect.innerHTML = '<option value="">Seleccione especialidad</option>';

                if (doctor && doctor.specialties) {
                    doctor.specialties.forEach(specialty => {
                        const option = document.createElement('option');
                        option.value = specialty.id;
                        option.textContent = specialty.nombre.toUpperCase();
                        option.className = 'font-medium';
                        especialidadSelect.appendChild(option);
                    });
                }
            });
        });
    </script>
@endsection
