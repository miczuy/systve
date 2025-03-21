@extends('layouts.admin')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-7xl mx-auto">
            <!-- Sección de Horarios -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl mb-8">
                <div class="p-6 md:p-8">
                    <!-- Header Horarios -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-3 rounded-xl shadow-lg">
                                <img src="https://cdn-icons-png.flaticon.com/512/4807/4807695.png"
                                     alt="Horarios"
                                     class="w-8 h-8 text-white">
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-montserrat">Listado de Horarios</h2>
                                <p class="text-sm text-gray-500 mt-1">Administra los horarios registrados en la plataforma</p>
                            </div>
                        </div>
                        <a href="{{ url('admin/horarios/create') }}"
                           class="flex items-center gap-2 px-6 py-3 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-white font-semibold text-sm md:text-base">Nuevo Horario</span>
                        </a>
                    </div>

                    <!-- Tabla Horarios -->
                    <div class="overflow-x-auto rounded-lg border border-gray-100/70">
                        <table class="w-full min-w-[800px] md:min-w-full">
                            <thead class="bg-gradient-to-br from-blue-50 to-purple-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">#</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Doctor</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Especialidad</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Consultorio</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Día</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Hora Inicio</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Hora Fin</th>
                                <th class="px-4 py-3 text-right text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/50">
                            @php $contador = 1; @endphp
                            @foreach($horarios as $horario)
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $contador++ }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $horario->doctor ? $horario->doctor->nombres . " " . $horario->doctor->apellidos : 'Sin Doctor' }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        @if($horario->doctor && $horario->doctor->specialties->isNotEmpty())
                                            @foreach($horario->doctor->specialties as $specialty)
                                                <span class="block">{{ $specialty->nombre }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-400">Sin especialidad</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $horario->consultorio->ubicacion }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $horario->dia }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $horario->hora_inicio ? Carbon::parse($horario->hora_inicio)->format('h:i A') : '--' }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $horario->hora_fin ? Carbon::parse($horario->hora_fin)->format('h:i A') : '--' }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm">
                                        <div class="flex items-center justify-end gap-2">
                                            <!-- Ver -->
                                            <a href="{{ url('admin/horarios/'.$horario->id) }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-blue-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ url('admin/horarios/'.$horario->id.'/edit') }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-yellow-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>

                                            <!-- Eliminar con SweetAlert -->
                                            <form action="{{ url('admin/horarios/'.$horario->id) }}" id="formulario{{$horario->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="preguntar{{$horario->id}}(event)" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-red-200 transition-all">
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{$horario->id}}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "¿Está seguro de eliminar este horario?",
                                                        text: "Se eliminará el horario del día {{$horario->dia}} de {{$horario->hora_inicio ? Carbon::parse($horario->hora_inicio)->format('h:i A') : '--'}} a {{$horario->hora_fin ? Carbon::parse($horario->hora_fin)->format('h:i A') : '--'}}. Esta acción no se puede deshacer.",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#d33",
                                                        cancelButtonColor: "#3085d6",
                                                        confirmButtonText: "Sí, eliminar",
                                                        cancelButtonText: "Cancelar"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('formulario{{$horario->id}}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ url('admin') }}"
                           class="flex items-center gap-2 px-6 py-3 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02] border border-gray-200 hover:border-blue-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span class="text-gray-700 font-medium text-sm md:text-base">Volver al Panel</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sección Calendario -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="p-6 md:p-8">
                    <!-- Header Calendario -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-3 rounded-xl shadow-lg">
                                <img src="https://cdn-icons-png.freepik.com/512/3652/3652191.png"
                                     alt="Calendario"
                                     class="w-8 h-8 text-white">
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-montserrat">Calendario de Doctores</h2>
                                <p class="text-sm text-gray-500 mt-1">Visualización semanal de horarios médicos</p>
                            </div>
                        </div>
                    </div>
                    <!-- Campo de Consultorios -->
                    <div>
                        <select name="consultorio_id" id="consultorio_select" class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white transition-all duration-200 shadow-sm appearance-none">
                            <option value="">Seleccione un consultorio</option>
                            @foreach($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}" class="font-medium">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div id="consultorio_info"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Asegúrate de incluir SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
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
        });

        // Mensaje de éxito después de eliminar
        @if(session('mensaje'))
        Swal.fire({
            title: "¡Completado!",
            text: "{{ session('mensaje') }}",
            icon: "{{ session('icono', 'success') }}",
            timer: 3000,
            timerProgressBar: true
        });
        @endif
    </script>
@endsection
