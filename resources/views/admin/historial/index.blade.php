@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 grid place-items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mx-auto transition-all duration-300 hover:shadow-2xl">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 space-y-4 md:space-y-0 bg-white">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-br from-whitee-600 to-white-600 p-3 rounded-xl shadow-lg">
                                <img src="   https://cdn-icons-png.flaticon.com/512/3045/3045155.png "  width="40" height="40" alt="" title="" class="img-small">

                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 font-montserrat">Historial Medico</h2>
                                <p class="text-sm text-gray-500 mt-1">Administrar las historial</p>
                            </div>
                        </div>
                        <a href="{{ url('admin/historial/create') }}"
                           class="group relative flex items-center space-x-2 px-6 py-3 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-white font-semibold">Nueva Historial</span>
                        </a>
                    </div>

                    <!-- Tabla Responsive -->
                    <div class="overflow-x-auto rounded-xl border border-gray-100/70 bg-whiter">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-br from-blue-50 to-purple-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">#</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Detalles</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Fecha</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Paciente</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Doctor</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-blue-900 uppercase tracking-wider font-montserrat">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100/50">
                            @php $contador = 1; @endphp
                            @foreach($historiales as $historiale)
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $contador++ }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $historiale->detalle }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $historiale->fecha_visita }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $historiale->paciente_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $historiale->doctor_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ url('admin/historial/'.$historiale->id) }}" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-blue-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <a href="{{ url('admin/historial/'.$historiale->id.'/edit') }}" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-yellow-200 transition-all">
                                                <svg class="w-5 h-5 text-gray-600 hover:text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>

                                            <form action="{{ url('admin/historial/'.$historiale->id) }}" id="formulario{{$historiale->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="preguntar{{$historiale->id}}(event)" class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md border border-gray-200 hover:border-red-200 transition-all">
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{$historiale->id}}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "¿Está seguro de eliminar esta configuración?",
                                                        text: "Esta acción no se puede deshacer. Los datos serán eliminados permanentemente.",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#d33",
                                                        cancelButtonColor: "#3085d6",
                                                        confirmButtonText: "Sí, eliminar",
                                                        cancelButtonText: "Cancelar"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('formulario{{$historiale->id}}').submit();
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
                           class="flex items-center space-x-2 px-6 py-3 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02] border border-gray-200 hover:border-blue-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
