@extends('layouts.admin')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4 sm:p-6 lg:p-8 flex items-center justify-center">
        <div class="w-full max-w-7xl mx-auto">
            <!-- Contenedor principal con sombra y bordes redondeados -->
            <div class="bg-white rounded-2xl shadow-2xl border border-gray-100">
                <div class="p-6 md:p-8">
                    <!-- Header con gradiente y diseño moderno -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-3 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
                                <img src="https://cdn-icons-png.flaticon.com/512/17958/17958385.png" alt="Consultorios" class="w-10 h-10 text-white">
                            </div>
                            <div class="text-center md:text-left">
                                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 font-montserrat bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-800">Historial de Citas</h2>
                                <p class="text-sm text-gray-500 mt-1">Visualiza el historial completo de citas médicas del paciente.</p>
                            </div>
                        </div>

                        <!-- Contador de citas -->
                        <div class="bg-blue-50 rounded-xl p-3 shadow-sm border border-blue-100 flex items-center gap-3">
                            <div class="bg-blue-100 rounded-lg p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs text-blue-600 font-medium">Total de citas</span>
                                <p class="font-bold text-gray-700">{{ count($eventos) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nueva tabla con diseño de tarjetas para móviles -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Encabezado de tabla para escritorio - oculto en móvil -->
                        <div class="hidden md:grid md:grid-cols-8 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-t-xl py-4 px-6 font-semibold text-sm text-indigo-900 uppercase tracking-wider font-montserrat text-center">
                            <div class="col-span-1">#</div>
                            <div class="col-span-1">Doctor</div>
                            <div class="col-span-1">Especialidad</div>
                            <div class="col-span-1">Fecha</div>
                            <div class="col-span-1">Hora</div>
                            <div class="col-span-1">Estado</div>
                            <div class="col-span-1">Registrado</div>
                            <div class="col-span-1">Acciones</div>
                        </div>

                        <!-- Filas de datos como tarjetas responsivas -->
                        @php $contador = 1; @endphp
                        @foreach($eventos as $evento)
                            <div class="bg-white rounded-xl shadow border border-gray-100 transition-all duration-200 hover:shadow-md
                                @if($evento->estado === 'cancelada') bg-red-50 @endif">
                                <div class="md:grid md:grid-cols-8 md:items-center gap-2 py-4 px-6 text-center">
                                    <!-- Número -->
                                    <div class="md:col-span-1 mb-2 md:mb-0 flex justify-center md:block">
                                        <div class="flex items-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">#:</span>
                                            <span class="font-medium text-gray-700">{{ $contador++ }}</span>
                                        </div>
                                    </div>

                                    <!-- Doctor -->
                                    <div class="md:col-span-1 mb-2 md:mb-0">
                                        <div class="flex items-center justify-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Doctor:</span>
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <span class="font-medium text-blue-700">{{ substr($evento->doctor->nombres, 0, 1) }}</span>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">{{ $evento->doctor->nombres . " " . $evento->doctor->apellidos }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Especialidad -->
                                    <div class="md:col-span-1 mb-2 md:mb-0">
                                        <div class="flex items-center justify-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Especialidad:</span>
                                            @if($evento->doctor->specialties->isNotEmpty())
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                                    {{ $evento->doctor->specialties->pluck('nombre')->join(', ') }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Sin especialidad
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Fecha -->
                                    <div class="md:col-span-1 mb-2 md:mb-0">
                                        <div class="flex items-center justify-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Fecha:</span>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hora -->
                                    <div class="md:col-span-1 mb-2 md:mb-0">
                                        <div class="flex items-center justify-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Hora:</span>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($evento->start)->format('h:i A') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Estado -->
                                    <div class="md:col-span-1 mb-2 md:mb-0">
                                        <div class="flex items-center justify-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Estado:</span>
                                            @if($evento->estado === 'cancelada')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    CANCELADA
                                                </span>
                                            @elseif($evento->estado === 'atendida')
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    ATENDIDA
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    PENDIENTE
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Registrado -->
                                    <div class="md:col-span-1 mb-2 md:mb-0">
                                        <div class="flex items-center justify-center md:justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Registrado:</span>
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                                </svg>
                                                {{ $evento->created_at->format('d/m/Y h:i A') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Acciones -->
                                    <div class="md:col-span-1">
                                        <div class="flex items-center justify-center">
                                            <span class="md:hidden font-semibold text-gray-600 text-sm mr-2">Acciones:</span>
                                            @if($evento->estado !== 'cancelada')
                                                <form action="{{url('admin/eventos/destroy',$evento->id)}}"
                                                      id="formulario{{$evento->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="preguntar{{$evento->id}}(event)" class="p-2 rounded-lg bg-red-50 shadow-sm hover:shadow-md hover:bg-red-100 border border-red-100 transition-all transform hover:scale-110" title="Cancelar cita">
                                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{$evento->id}}(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: "¿Está seguro de cancelar esta cita?",
                                                            text: "Si cancela esta cita, el horario quedará disponible para otros pacientes.",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#d33",
                                                            cancelButtonColor: "#3085d6",
                                                            confirmButtonText: "Sí, cancelar",
                                                            cancelButtonText: "No, mantener"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('formulario{{$evento->id}}').submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                            @else
                                                <span class="text-xs text-gray-500 italic">Cita cancelada</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Footer con botón de volver -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ url('admin') }}" class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span class="font-medium">Volver al Panel</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta informativa con leyenda de estados -->
            <div class="mt-6 bg-white rounded-xl shadow-md p-4 border border-gray-100">
                <div class="flex flex-col space-y-4 items-center text-center">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-600">Las citas médicas son mostradas desde la más reciente a la más antigua.</p>
                    </div>

                    <!-- Leyenda de estados -->
                    <div class="flex flex-wrap gap-4 items-center justify-center">
                        <span class="text-sm font-medium text-gray-700">Estados de citas:</span>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 rounded-full bg-yellow-100 border border-yellow-200 mr-2"></span>
                            <span class="text-xs text-gray-600">Pendiente</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 rounded-full bg-green-100 border border-green-200 mr-2"></span>
                            <span class="text-xs text-gray-600">Atendida</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 rounded-full bg-red-100 border border-red-200 mr-2"></span>
                            <span class="text-xs text-gray-600">Cancelada</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
