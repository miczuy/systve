@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50/80 to-indigo-50/90 grid place-items-center py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mx-auto transition-all duration-300 hover:shadow-xl border border-gray-100/60">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 space-y-4 md:space-y-0">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-50 p-3 rounded-xl shadow-sm border border-blue-100/50">
                                <img src="https://cdn-icons-png.flaticon.com/512/3045/3045155.png" width="42" height="42" alt="" class="object-contain">
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-montserrat">Historial Médico</h2>
                                <p class="text-sm text-gray-500 mt-1">Administración de historiales clínicos</p>
                            </div>
                        </div>
                        <a href="{{ url('admin/historial/create') }}"
                           class="group relative flex items-center space-x-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:translate-y-[-2px]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-white font-medium">Nuevo Historial</span>
                        </a>
                    </div>

                    <!-- Filtros de búsqueda -->
                    <div class="mb-6 p-4 bg-blue-50/60 rounded-xl border border-blue-100/70">
                        <form action="{{ route('admin.historial.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label for="doctor_id" class="block text-sm font-medium text-gray-700 mb-1">Doctor</label>
                                <select name="doctor_id" id="doctor_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Todos los doctores</option>
                                    @foreach(\App\Models\Doctor::all() as $doctor)
                                        <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->nombres }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="mascota_id" class="block text-sm font-medium text-gray-700 mb-1">Mascota</label>
                                <select name="mascota_id" id="mascota_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Todas las mascotas</option>
                                    @foreach(\App\Models\Mascota::where('estado', 'Activo')->get() as $mascota)
                                        <option value="{{ $mascota->id }}" {{ request('mascota_id') == $mascota->id ? 'selected' : '' }}>
                                            {{ $mascota->nombre }} ({{ $mascota->especie }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="fecha_desde" class="block text-sm font-medium text-gray-700 mb-1">Desde</label>
                                <input type="date" name="fecha_desde" id="fecha_desde" value="{{ request('fecha_desde') }}"
                                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="flex items-end">
                                <button type="submit" class="w-full flex items-center justify-center space-x-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg shadow-sm text-white hover:shadow-md transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span>Filtrar</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tabla Responsive -->
                    <div class="overflow-x-auto rounded-xl border border-gray-100 shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-blue-50 to-indigo-50">
                            <tr>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-blue-900 uppercase tracking-wider font-montserrat">#</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Fecha</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Mascota</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Propietario</th>
                                <th class="px-6 py-3.5 text-left text-xs font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Doctor</th>
                                <th class="px-6 py-3.5 text-center text-xs font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($historiales as $index => $historial)
                                <tr class="hover:bg-blue-50/40 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $historiales->firstItem() + $index }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $historial->fecha_visita->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($historial->mascota)
                                                <div class="flex-shrink-0 h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                                    <svg class="h-5 w-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                    </svg>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-700">{{ $historial->mascota->nombre }}</p>
                                                    <p class="text-xs text-gray-500">{{ $historial->mascota->especie }} - {{ $historial->mascota->raza }}</p>
                                                </div>
                                            @else
                                                <span class="text-sm text-gray-500">No disponible</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">
                                            @if($historial->paciente)
                                                <p class="font-medium">{{ $historial->paciente->nombre }}</p>
                                                <p class="text-xs text-gray-500">{{ $historial->paciente->telefono }}</p>
                                            @else
                                                <span class="text-sm text-gray-500">No disponible</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">
                                            @if($historial->doctor)
                                                <p class="font-medium">Dr. {{ $historial->doctor->nombre }}</p>
                                                <p class="text-xs text-gray-500">{{ $historial->doctor->especialidad }}</p>
                                            @else
                                                <span class="text-sm text-gray-500">No disponible</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ url('admin/historial/'.$historial->id) }}" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-blue-300 hover:bg-blue-50 transition-all">
                                                <svg class="w-4.5 h-4.5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <a href="{{ url('admin/historial/'.$historial->id.'/edit') }}" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50 transition-all">
                                                <svg class="w-4.5 h-4.5 text-gray-600 hover:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>

                                            <form action="{{ url('admin/historial/'.$historial->id) }}" id="formulario{{$historial->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="preguntar{{$historial->id}}(event)" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-red-300 hover:bg-red-50 transition-all">
                                                    <svg class="w-4.5 h-4.5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{$historial->id}}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "¿Está seguro de eliminar este historial?",
                                                        text: "Esta acción no se puede deshacer. Los datos serán eliminados permanentemente.",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#d33",
                                                        cancelButtonColor: "#3085d6",
                                                        confirmButtonText: "Sí, eliminar",
                                                        cancelButtonText: "Cancelar"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('formulario{{$historial->id}}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <p class="text-lg font-medium">No se encontraron registros</p>
                                            <p class="text-sm mt-1">Intente con otros criterios de búsqueda o cree un nuevo registro</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-6">
                        {{ $historiales->withQueryString()->links() }}
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ url('admin') }}"
                           class="flex items-center space-x-2 px-5 py-2.5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:translate-y-[-2px] border border-gray-200 hover:border-indigo-200">
                            <svg class="w-4.5 h-4.5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span class="text-gray-700 font-medium">Volver al Panel</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
