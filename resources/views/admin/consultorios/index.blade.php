@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-7xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl ">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-3 rounded-xl shadow-lg">
                                <img src="https://cdn-icons-png.flaticon.com/512/17958/17958385.png"
                                     alt="Consultorios"
                                     class="w-8 h-8 text-white">
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-montserrat">Listado de Consultorios</h2>
                                <p class="text-sm text-gray-500 mt-1">Administra los consultorios registrados en la plataforma</p>
                            </div>
                        </div>
                        <a href="{{ url('admin/consultorios/create') }}"
                           class="flex items-center gap-2 px-6 py-3 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-white font-semibold text-sm md:text-base">Nuevo Consultorio</span>
                        </a>
                    </div>

                    <!-- Tabla Responsive -->
                    <div class="overflow-x-auto rounded-lg border border-gray-100/70">
                        <table class="w-full min-w-[800px] md:min-w-full">
                            <thead class="bg-gradient-to-br from-blue-50 to-purple-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">#</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Nombre</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Ubicación</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Capacidad</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Teléfono</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Especialidad</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Estado</th>
                                <th class="px-4 py-3 text-right text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/50">
                            @php $contador = 1; @endphp
                            @foreach($consultorios as $consultorio)
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $contador++ }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $consultorio->nombre }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $consultorio->ubicacion }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $consultorio->capacidad }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $consultorio->telefono }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">{{ $consultorio->especialidad }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm">
                                        @if ($consultorio->is_active)
                                            <span class="px-2.5 py-1 rounded-full bg-green-100 text-green-800 text-xs md:text-sm">Activo</span>
                                        @else
                                            <span class="px-2.5 py-1 rounded-full bg-red-100 text-red-800 text-xs md:text-sm">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm">
                                        <div class="flex items-center justify-end gap-2">
                                            <!-- Toggle Estado -->
                                            <form action="{{ route('admin.consultorios.toggleEstado', $consultorio->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" title="Cambiar Estado"
                                                        class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-purple-200 transition-all">
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                                                    </svg>
                                                </button>
                                            </form>

                                            <!-- Ver -->
                                            <a href="{{ url('admin/consultorios/'.$consultorio->id) }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-blue-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ url('admin/consultorios/'.$consultorio->id.'/edit') }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-yellow-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>

                                            <!-- Eliminar -->
                                            <a href="{{ route('admin.consultorios.confirmDelete', $consultorio->id) }}"
                                               class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-red-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </a>
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
        </div>
    </div>
@endsection
