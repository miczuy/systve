@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Historial Médico de {{ $mascota->nombre }}</h1>
                    <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Volver a ficha
                    </a>
                </div>

                <div class="bg-blue-50 p-5 rounded-lg mb-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                @if($mascota->especie == 'Perro')
                                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                @elseif($mascota->especie == 'Gato')
                                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                    </svg>
                                @else
                                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">{{ $mascota->nombre }}</h2>
                                <p class="text-sm text-gray-600">{{ $mascota->especie }} {{ $mascota->raza ? '- ' . $mascota->raza : '' }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-white p-3 rounded-lg shadow-sm">
                                <p class="text-xs text-gray-500">Edad</p>
                                <p class="text-lg font-semibold">{{ $mascota->edad ? $mascota->edad . ' años' : 'No registrada' }}</p>
                            </div>
                            <div class="bg-white p-3 rounded-lg shadow-sm">
                                <p class="text-xs text-gray-500">Peso (último)</p>
                                <p class="text-lg font-semibold">{{ $mascota->peso ? $mascota->peso . ' kg' : 'No registrado' }}</p>
                            </div>
                            <div class="bg-white p-3 rounded-lg shadow-sm">
                                <p class="text-xs text-gray-500">Dueño</p>
                                <p class="text-lg font-semibold">{{ $mascota->paciente->user->name ?? 'No registrado' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(count($historiales) > 0)
                    <div class="border rounded-lg overflow-hidden mb-6">
                        <div class="bg-gray-50 px-4 py-3 border-b">
                            <h3 class="text-lg font-medium text-gray-700">Historial de consultas</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detalle</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($historiales as $historial)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $historial->fecha_visita->format('d/m/Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ $historial->fecha_visita->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $historial->doctor ? $historial->doctor->nombres . ' ' . $historial->doctor->apellidos : 'No asignado' }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                @if($historial->doctor && $historial->doctor->specialties->count() > 0)
                                                    {{ $historial->doctor->specialties->pluck('nombre')->join(', ') }}
                                                @else
                                                    No especificada
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ Str::limit($historial->detalle, 50) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.historial.show', $historial) }}" class="text-blue-600 hover:text-blue-900">Ver detalles</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $historiales->links() }}
                        </div>
                    </div>
                @else
                    <div class="bg-white p-8 text-center border rounded-lg">
                        <div class="bg-blue-50 inline-block p-4 rounded-full mb-4">
                            <svg class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-800 mb-2">No hay registros en el historial</h3>
                        <p class="text-gray-600 max-w-md mx-auto mb-6">Esta mascota aún no tiene registros en su historial médico. El historial se generará automáticamente cuando se completen consultas médicas.</p>

                        @can('admin.historial.create')
                            <a href="{{ route('admin.historial.create', ['mascota_id' => $mascota->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                Registrar una consulta
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
