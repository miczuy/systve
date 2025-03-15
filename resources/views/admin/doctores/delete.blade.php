@extends('layouts.admin')

@section('content')
    <div class="flex justify-center items-center min-h-screen overflow-auto py-6 mt-12">

        <div class="w-full max-w-3xl bg-white shadow-lg rounded-lg border border-gray-200 overflow-hidden">

            <div class="bg-gradient-to-r from-green-500 to-blue-600 text-white text-center px-6 py-4">
                <h1 class="text-2xl font-semibold">Ficha de Doctor</h1>
            </div>

            <!-- Resumen Visual -->
            <div class="border border-gray-300 rounded-lg m-6 p-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Resumen del Doctor</h3>
                <ul class="space-y-2">
                    <li><strong>Nombre:</strong> {{ $doctor->nombres }} {{ $doctor->apellidos }}</li>
                    <li><strong>Cédula:</strong> {{ $doctor->cedula }}</li>
                    <li><strong>Teléfono:</strong> {{ $doctor->telefono }}</li>
                    <li><strong>Correo:</strong> {{ $doctor->user->email }}</li>
                    <li><strong>Especialidades:</strong>
                        @if (!empty($doctor->specialties) && $doctor->specialties->isNotEmpty())
                            @foreach($doctor->specialties as $specialty)
                                <span class="inline-block bg-blue-100 text-blue-700 rounded-full px-2 py-1 text-sm">{{ $specialty->nombre }}</span>
                            @endforeach
                        @else
                            <p class="text-gray-500">No se encontraron especialidades asignadas.</p>
                        @endif
                    </li>
                </ul>
            </div>

            <!-- Formulario para eliminar -->
            <form id="eliminar-doctores-form" action="{{ url('/admin/doctores', $doctor->id) }}" method="POST" class="m-6">
                @csrf
                @method('DELETE')
                <fieldset class="border border-gray-300 rounded-md p-4">
                    <legend class="text-xl font-medium text-gray-700 text-center">Eliminar Doctor</legend>
                    <p class="text-gray-600 mb-4 text-center">¿Estás seguro de que deseas eliminar a este doctor?</p>
                </fieldset>

                <div class="mt-6 flex justify-center space-x-4">
                    <!-- Botón de cancelar -->
                    <a href="{{ url('admin/doctores') }}" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span>Cancelar</span>
                    </a>

                    <!-- Botón de eliminar -->
                    <button type="button" onclick="confirmDelete()" class="inline-block bg-red-600 text-white text-lg font-medium rounded-lg py-2.5 px-5 hover:bg-red-700 flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>Eliminar</span>
                    </button>
                </div>
            </form>

            <!-- Spinner de carga -->
            <div id="loading-spinner" class="hidden flex justify-center items-center p-4">
                <svg class="animate-spin h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: "¿Eliminar Doctor?",
                html: `
                    <div class="text-left">
                        <p><strong>Nombre:</strong> {{ $doctor->nombres }} {{ $doctor->apellidos }}</p>
                        <p><strong>Cédula:</strong> {{ $doctor->cedula }}</p>
                        <p><strong>Correo:</strong> {{ $doctor->user->email }}</p>
                    </div>
                `,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('loading-spinner').classList.remove('hidden'); // Mostrar spinner
                    document.getElementById('eliminar-doctores-form').submit();
                }
            });
        }
    </script>
@endsection
