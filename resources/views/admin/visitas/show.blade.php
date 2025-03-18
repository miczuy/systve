@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Detalles de la Visita</h1>
                    <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Volver
                    </a>
                </div>

                <div class="bg-blue-50 p-4 rounded-lg mb-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-blue-800">Información de la Visita</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Fecha de visita:</p>
                            <p class="font-medium">{{ $visita->fecha_visita->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Hora:</p>
                            <p class="font-medium">{{ $visita->hora_visita->format('H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Estado:</p>
                            <p class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $visita->estado == 'Completada' ? 'bg-green-100 text-green-800' :
                                ($visita->estado == 'Programada' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                {{ $visita->estado }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Motivo de consulta:</p>
                            <p class="font-medium">{{ $visita->motivo_consulta }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-4 border rounded-lg">
                        <h3 class="font-semibold text-lg mb-4 text-gray-700 border-b pb-2">Información de la Mascota</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Nombre:</p>
                                <p class="font-medium">{{ $visita->mascota->nombre }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Especie:</p>
                                <p class="font-medium">{{ $visita->mascota->especie }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Raza:</p>
                                <p class="font-medium">{{ $visita->mascota->raza ?: 'No especificada' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Edad:</p>
                                <p class="font-medium">{{ $visita->mascota->edad ? $visita->mascota->edad . ' años' : 'No especificada' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Peso actual:</p>
                                <p class="font-medium">{{ $visita->peso ? $visita->peso . ' kg' : 'No registrado' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Temperatura:</p>
                                <p class="font-medium">{{ $visita->temperatura ? $visita->temperatura . ' °C' : 'No registrada' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 border rounded-lg">
                        <h3 class="font-semibold text-lg mb-4 text-gray-700 border-b pb-2">Información del Doctor</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Nombre completo:</p>
                                <p class="font-medium">{{ $visita->doctor->nombres ?? '' }} {{ $visita->doctor->apellidos ?? '' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Especialidad:</p>
                                <p class="font-medium">
                                    @if($visita->specialty_id)
                                        {{ optional(\App\Models\Specialty::find($visita->specialty_id))->nombre ?? 'No especificada' }}
                                    @elseif($visita->doctor && $visita->doctor->specialties->count() > 0)
                                        {{ $visita->doctor->specialties->pluck('nombre')->join(', ') }}
                                    @else
                                        No especificada
                                    @endif
                                </p>
                            </div>
                            @if($visita->doctor && $visita->doctor->telefono)
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Teléfono de contacto:</p>
                                    <p class="font-medium">{{ $visita->doctor->telefono }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 border rounded-lg mb-6">
                    <h3 class="font-semibold text-lg mb-4 text-gray-700 border-b pb-2">Detalles Médicos</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="font-medium text-gray-700 mb-1">Síntomas:</p>
                            <p class="text-gray-600">{{ $visita->sintomas ?: 'No se registraron síntomas' }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-700 mb-1">Diagnóstico:</p>
                            <p class="text-gray-600">{{ $visita->diagnostico ?: 'No se registró diagnóstico' }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-700 mb-1">Tratamiento:</p>
                            <p class="text-gray-600">{{ $visita->tratamiento ?: 'No se indicó tratamiento' }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-700 mb-1">Observaciones:</p>
                            <p class="text-gray-600">{{ $visita->observaciones ?: 'No hay observaciones adicionales' }}</p>
                        </div>
                        @if($visita->fecha_seguimiento)
                            <div>
                                <p class="font-medium text-gray-700 mb-1">Fecha de seguimiento:</p>
                                <p class="text-gray-600">{{ $visita->fecha_seguimiento->format('d/m/Y') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <a href="{{ route('admin.mascotas.edit', $visita->mascota_id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Ver ficha de la mascota
                    </a>

                    @if($visita->estado == 'Completada')
                        <a href="{{ route('admin.historial.porMascota', $visita->mascota_id) }}" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                            Ver historial médico
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
