<!-- resources/views/paciente/mascotas/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 grid place-items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mx-auto transition-all duration-300 hover:shadow-2xl">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 space-y-4 md:space-y-0 bg-white">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-3 rounded-xl shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 font-montserrat">Mis Mascotas</h2>
                                <p class="text-sm text-gray-500 mt-1">Administra tus mascotas registradas</p>
                            </div>
                        </div>
                        <a href="{{ route('paciente.mascotas.create') }}"
                           class="group relative flex items-center space-x-2 px-6 py-3 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-white font-semibold">Nueva Mascota</span>
                        </a>
                    </div>

                    @if(session('mensaje'))
                        <div class="bg-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-50 border-l-4 border-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-500 p-5 mb-8 rounded-xl shadow-sm transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    @if(session('icono') === 'success')
                                        <svg class="h-6 w-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg class="h-6 w-6 text-rose-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-medium text-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-800">
                                        {{ session('icono') === 'success' ? '¡Operación exitosa!' : '¡Ha ocurrido un error!' }}
                                    </h3>
                                    <p class="mt-1 text-sm text-{{ session('icono') === 'success' ? 'emerald' : 'rose' }}-700">{{ session('mensaje') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Tabla de Mascotas -->
                    <div class="overflow-x-auto rounded-xl border border-gray-100/70 bg-white">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-br from-blue-50 to-purple-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Mascota</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Especie/Raza</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Edad</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Estado</th>
                                <th class="px-6 py-4 text-right text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/50">
                            @forelse ($mascotas as $mascota)
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if($mascota->foto)
                                                    <img src="{{ url('storage/'.$mascota->foto) }}" alt="foto" class="w-10 h-10 object-cover rounded">
                                                @else
                                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $mascota->nombre }}</div>
                                                <div class="text-sm text-gray-500">
                                                    @if($mascota->sexo == 'Macho')
                                                        <span class="text-blue-600">♂ Macho</span>
                                                    @elseif($mascota->sexo == 'Hembra')
                                                        <span class="text-pink-600">♀ Hembra</span>
                                                    @else
                                                        <span class="text-gray-500">No especificado</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $mascota->especie }}</div>
                                        <div class="text-sm text-gray-500">{{ $mascota->raza }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($mascota->fecha_nacimiento)
                                            {{ \Carbon\Carbon::parse($mascota->fecha_nacimiento)->age }} años
                                        @else
                                            No registrada
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($mascota->estado == 'Activo')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                                        @elseif($mascota->estado == 'Inactivo')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Inactivo</span>
                                        @elseif($mascota->estado == 'Fallecido')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Fallecido</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('paciente.mascotas.show', $mascota) }}" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-blue-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <a href="{{ route('paciente.mascotas.edit', $mascota) }}" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-yellow-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        <div class="py-8">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            <p class="mt-4 text-gray-500">No has registrado mascotas aún</p>
                                            <a href="{{ route('paciente.mascotas.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-br from-blue-600 to-purple-600 text-white rounded-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                                Registrar mi primera mascota
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Información adicional -->
                    <div class="mt-8 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 mb-8 border border-blue-100">
                        <h3 class="font-medium text-blue-800 mb-3">¿Por qué registrar tus mascotas?</h3>
                        <ul class="space-y-2 text-blue-700 text-sm">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Facilita el agendamiento de citas médicas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Mantiene organizado el historial médico</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Permite un mejor seguimiento de tratamientos y vacunas</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ url('/admin') }}"
                           class="flex items-center space-x-2 px-6 py-3 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02] border border-gray-200 hover:border-blue-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span class="text-gray-700 font-medium">Volver al Inicio</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
