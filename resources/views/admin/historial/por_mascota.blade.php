@extends('layouts.admin')

@section('content')
    <div class="py-10 bg-gradient-to-br ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-0 transition-all duration-300 border border-gray-100">

                <!-- Cabecera con imagen de fondo y datos principales -->
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-10 sm:px-10 overflow-hidden">
                    <!-- Patrón decorativo de fondo -->
                    <div class="absolute inset-0 opacity-10">
                        <svg class="h-full w-full" viewBox="0 0 800 800">
                            <path d="M20,20 L400,20 L400,400 L20,400 L20,20 Z" fill="none" stroke="currentColor" stroke-width="1"></path>
                            <path d="M420,20 L780,20 L780,400 L420,400 L420,20 Z" fill="none" stroke="currentColor" stroke-width="1"></path>
                            <path d="M20,420 L400,420 L400,780 L20,780 L20,420 Z" fill="none" stroke="currentColor" stroke-width="1"></path>
                            <path d="M420,420 L780,420 L780,780 L420,780 L420,420 Z" fill="none" stroke="currentColor" stroke-width="1"></path>
                            <circle cx="400" cy="400" r="350" fill="none" stroke="currentColor" stroke-width="1"></circle>
                            <circle cx="400" cy="400" r="250" fill="none" stroke="currentColor" stroke-width="1"></circle>
                            <circle cx="400" cy="400" r="150" fill="none" stroke="currentColor" stroke-width="1"></circle>
                        </svg>
                    </div>

                    <div class="flex flex-col md:flex-row justify-between relative z-10">
                        <!-- Info de mascota -->
                        <div class="flex items-center mb-6 md:mb-0">
                            <div class="bg-white p-3 rounded-2xl mr-5 shadow-lg flex items-center justify-center h-16 w-16 transform transition-transform hover:rotate-3 hover:scale-110">
                                @if($mascota->especie == 'Perro')
                                    <svg class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                @elseif($mascota->especie == 'Gato')
                                    <svg class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                    </svg>
                                @else
                                    <svg class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <h2 class="text-3xl font-extrabold text-white tracking-tight">{{ $mascota->nombre }}</h2>
                                    <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="ml-4 p-1.5 bg-white/20 hover:bg-white/30 rounded-lg transition-colors text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="flex items-center mt-1">
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-white/20 text-white backdrop-blur-sm">
                                    {{ $mascota->especie }}
                                </span>
                                    @if($mascota->raza)
                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm ml-2">
                                    {{ $mascota->raza }}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Botón de volver -->
                        <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="inline-flex items-center px-4 py-2 bg-white text-blue-700 rounded-xl hover:bg-blue-50 transition-colors font-medium shadow-sm self-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            Volver a ficha
                        </a>
                    </div>
                </div>

                <!-- Tarjetas de información -->
                <div class="px-8 py-5 sm:px-10 -mt-6 relative z-20">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div class="bg-white rounded-xl shadow-md p-4 border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-1">Edad</p>
                                    <p class="text-xl font-bold text-gray-800">{{ $mascota->edad ? $mascota->edad . ' años' : 'No registrada' }}</p>
                                </div>
                                <div class="bg-blue-50 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-md p-4 border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-1">Peso (último)</p>
                                    <p class="text-xl font-bold text-gray-800">{{ $mascota->peso ? $mascota->peso . ' kg' : 'No registrado' }}</p>
                                </div>
                                <div class="bg-indigo-50 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-md p-4 border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-1">Dueño</p>
                                    <p class="text-xl font-bold text-gray-800">{{ $mascota->paciente->user->name ?? 'No registrado' }}</p>
                                </div>
                                <div class="bg-purple-50 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Título de sección historial -->
                <div class="px-8 py-5 sm:px-10">
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Historial de Consultas
                    </h1>
                </div>

                <!-- Historial de consultas -->
                @if(count($historiales) > 0)
                    <div class="px-8 pb-8 sm:px-10">
                        <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr class="bg-gray-50">
                                        <th scope="col" class="group px-6 py-4 text-left">
                                            <div class="flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Fecha
                                            </div>
                                        </th>
                                        <th scope="col" class="group px-6 py-4 text-left">
                                            <div class="flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Doctor
                                            </div>
                                        </th>
                                        <th scope="col" class="group px-6 py-4 text-left">
                                            <div class="flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                Detalle
                                            </div>
                                        </th>
                                        <th scope="col" class="group px-6 py-4 text-left">
                                            <div class="flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Acciones
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($historiales as $historial)
                                        <tr class="hover:bg-blue-50/50 transition-colors">
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="bg-blue-100 p-2 rounded-lg mr-3 hidden sm:block">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-bold text-gray-900">{{ $historial->fecha_visita->format('d/m/Y') }}</div>
                                                        <div class="text-xs text-blue-600 font-medium">{{ $historial->fecha_visita->format('H:i') }} hrs</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $historial->doctor ? $historial->doctor->nombres . ' ' . $historial->doctor->apellidos : 'No asignado' }}
                                                </div>
                                                @if($historial->doctor && $historial->doctor->specialties->count() > 0)
                                                    <div class="flex flex-wrap gap-1 mt-1">
                                                        @foreach($historial->doctor->specialties as $specialty)
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                                                {{ $specialty->nombre }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                        No especificada
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-5">
                                                <div class="text-sm text-gray-900 max-w-xs">
                                                    <div class="line-clamp-2">{{ $historial->detalle }}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('admin.historial.show', $historial) }}" class="inline-flex items-center px-3 py-1.5 border border-blue-700 text-blue-700 bg-white hover:bg-blue-700 hover:text-white rounded-lg transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Ver detalles
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-white px-6 py-4 border-t border-gray-200">
                                {{ $historiales->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="px-8 pb-8 sm:px-10">
                        <div class="bg-white p-8 rounded-xl shadow-sm border border-dashed border-gray-300">
                            <div class="text-center">
                                <div class="relative mx-auto w-32 h-32 mb-6">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full animate-pulse"></div>
                                    <div class="absolute inset-3 bg-white rounded-full flex items-center justify-center">
                                        <svg class="h-16 w-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </div>
                                </div>

                                <h3 class="text-2xl font-bold text-gray-800 mb-3">Historial médico vacío</h3>
                                <p class="text-gray-600 max-w-lg mx-auto mb-8">Esta mascota aún no tiene registros en su historial médico. El historial se generará automáticamente cuando se completen consultas médicas.</p>

                                @can('admin.historial.create')
                                    <a href="{{ route('admin.historial.create', ['mascota_id' => $mascota->id]) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-xl shadow-md hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Registrar primera consulta
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <style>
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Estilos para truncar texto en múltiples líneas */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
