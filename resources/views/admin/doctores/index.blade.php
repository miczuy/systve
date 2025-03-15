@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-7xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-3 rounded-xl shadow-lg">
                                <img src="https://cdn-icons-png.flaticon.com/512/4807/4807695.png"
                                     alt="Doctores"
                                     class="w-8 h-8 text-white">
                            </div>
                            <div class="text-center md:text-left">
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-montserrat">Listado de Doctores</h2>
                                <p class="text-sm text-gray-500 mt-1">Administra los doctores registrados en la plataforma</p>
                            </div>
                        </div>

                        <!-- Controles: Búsqueda + Exportar + Nuevo -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto justify-center">
                            <!-- Búsqueda -->
                            <form action="{{ route('admin.doctores.index') }}" method="GET" class="flex items-center relative w-full sm:w-64">
                                <input type="text" name="search" placeholder="Buscar doctor..." value="{{ request('search') }}" class="w-full px-4 py-2 pr-10 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 outline-none text-center">
                                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </button>
                            </form>

                            <!-- Botón exportar PDF -->
                            <a href="{{ route('admin.doctores.export-pdf') }}?{{ http_build_query(request()->query()) }}"
                               class="flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                <span class="text-white font-semibold text-sm md:text-base">Exportar PDF</span>
                            </a>

                            <!-- Botón Nuevo Doctor -->
                            <a href="{{ url('admin/doctores/create') }}"
                               class="flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="text-white font-semibold text-sm md:text-base">Nuevo Doctor</span>
                            </a>
                        </div>
                    </div>



                    <!-- Tabla Responsive -->
                    <div class="overflow-x-auto rounded-lg border border-gray-100/70">
                        <table class="w-full min-w-[800px] md:min-w-full">
                            <thead class="bg-gradient-to-br from-blue-50 to-purple-50">
                            <tr>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">#</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Nombre</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Cédula</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Teléfono</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Licencia Médica</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Especialidad</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Email</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/50">
                            @forelse($doctores as $index => $doctor)
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-700 text-center">
                                        {{ ($doctores->currentPage() - 1) * $doctores->perPage() + $index + 1 }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">{{ $doctor->nombres }} {{ $doctor->apellidos }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">{{ $doctor->cedula }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">{{ $doctor->telefono }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">{{ $doctor->licencia_medica }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                        @if($doctor->specialties->isNotEmpty())
                                            <div class="flex flex-col items-center">
                                                @foreach($doctor->specialties as $specialty)
                                                    <span class="font-medium">{{ $specialty->nombre }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-400">Sin especialidad</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">{{ $doctor->user->email }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Ver -->
                                            <a href="{{ url('admin/doctores/'.$doctor->id) }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-blue-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ url('admin/doctores/'.$doctor->id.'/edit') }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-yellow-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>

                                            <!-- Eliminar -->
                                            <a href="{{ url('admin/doctores/'.$doctor->id.'/confirm-delete') }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-red-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <p class="text-lg font-medium">No se encontraron doctores</p>
                                            <p class="text-sm mt-1">Intenta con otra búsqueda o agrega un nuevo doctor</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <!-- Información de registros -->
                    <div class="mb-4 text-sm text-gray-600 text-center">
                        Mostrando {{ $doctores->firstItem() ?? 0 }} - {{ $doctores->lastItem() ?? 0 }} de {{ $doctores->total() }} doctor
                    </div>
                    <!-- Paginación -->
                    <div class="mt-6 flex justify-center">
                        {{ $doctores->appends(request()->query())->links() }}
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
        </div>
    </div>
@endsection
