@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Detalles de Historial Médico</h1>
                    <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Volver
                    </a>
                </div>

                <div class="bg-blue-50 p-4 rounded-lg mb-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">Historial #{{ $historial->id }}</h2>
                                <p class="text-sm text-gray-600">{{ $historial->fecha_visita->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="px-4 py-2 bg-blue-100 text-blue-800 rounded-lg">
                            <span class="font-semibold">Estado:</span>
                            {{ $historial->estado ?? 'Completado' }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-4 border rounded-lg">
                        <h3 class="font-semibold text-lg mb-4 text-gray-700 border-b pb-2">Información del Paciente</h3>

                        @if($historial->tipo_paciente == 'Mascota' && $historial->mascota)
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Tipo de paciente:</p>
                                    <p class="font-medium">Mascota</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Nombre de la mascota:</p>
                                    <p class="font-medium">{{ $historial->mascota->nombre }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Especie:</p>
                                    <p class="font-medium">{{ $historial->mascota->especie }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Raza:</p>
                                    <p class="font-medium">{{ $historial->mascota->raza ?? 'No especificada' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Propietario:</p>
                                    <p class="font-medium">{{ $historial->paciente->user->name ?? 'No especificado' }}</p>
                                </div>
                            </div>
                        @else
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Tipo de paciente:</p>
                                    <p class="font-medium">{{ $historial->tipo_paciente ?? 'No especificado' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Paciente:</p>
                                    <p class="font-medium">{{ $historial->paciente->user->name ?? 'No especificado' }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="bg-white p-4 border rounded-lg">
                        <h3 class="font-semibold text-lg mb-4 text-gray-700 border-b pb-2">Información del Doctor</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Nombre del doctor:</p>
                                <p class="font-medium">
                                    @if($historial->doctor)
                                        {{ $historial->doctor->nombres }} {{ $historial->doctor->apellidos }}
                                    @else
                                        No especificado
                                    @endif
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Especialidad:</p>
                                <p class="font-medium">
                                    @if($historial->doctor && $historial->doctor->specialties->count() > 0)
                                        {{ $historial->doctor->specialties->pluck('nombre')->join(', ') }}
                                    @else
                                        No especificada
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 border rounded-lg mb-6">
                    <h3 class="font-semibold text-lg mb-4 text-gray-700 border-b pb-2">Detalles de la Consulta</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="font-medium text-gray-700 mb-1">Detalle:</p>
                            <div class="p-4 bg-gray-50 rounded-lg">
                                {!! nl2br(e($historial->detalle)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    @if($historial->mascota)
                        <a href="{{ route('admin.mascotas.edit', $historial->mascota_id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Ver ficha de la mascota
                        </a>

                        <a href="{{ route('admin.historial.porMascota', $historial->mascota_id) }}" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                            Ver todo el historial
                        </a>
                    @endif

                    @can('admin.historial.edit')
                        <a href="{{ route('admin.historial.edit', $historial) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            Editar historial
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
