@extends('layouts.admin')

@section('content')
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-lg bg-white shadow-2xl rounded-lg overflow-hidden">
            <!-- Encabezado -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-5 px-6 rounded-t-lg text-center">
                <h2 class="text-3xl font-bold mb-1">Eliminar Enfermera</h2>
                <p class="text-lg">Estás a punto de eliminar a la enfermera: <span class="font-semibold">{{ $enfermera->nombres }} {{ $enfermera->apellidos }}</span></p>
            </div>

            <!-- Resumen Visual -->
            <div class="border border-gray-300 rounded-lg m-6 p-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Resumen de la Enfermera</h3>
                <ul class="space-y-2">
                    <li><strong>Nombre:</strong> {{ $enfermera->nombres }} {{ $enfermera->apellidos }}</li>
                    <li><strong>Cédula:</strong> {{ $enfermera->cedula }}</li>
                    <li><strong>Correo:</strong> {{ $enfermera->user->email }}</li>
                </ul>
            </div>

            <!-- Formulario para eliminar -->
            <form id="eliminar-enfermera-form" action="{{ url('/admin/enfermeras', $enfermera->id) }}" method="POST" class="m-6">
                @csrf
                @method('DELETE')
                <fieldset class="border border-gray-300 rounded-md p-4">
                    <legend class="text-xl font-medium text-gray-700 text-center">Confirmación</legend>
                    <p class="text-gray-600 mb-4 text-center">¿Estás seguro de que deseas eliminar a esta enfermera?</p>
                </fieldset>

                <div class="mt-6 flex justify-center space-x-4">
                    <!-- Botón de cancelar -->
                    <a href="{{ url('admin/enfermeras') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition flex items-center space-x-2">
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
                        <span>Eliminar Enfermera</span>
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
                title: "¿Eliminar Enfermera?",
                html: `
                    <div class="text-left">
                        <p><strong>Nombre:</strong> {{ $enfermera->nombres }} {{ $enfermera->apellidos }}</p>
                        <p><strong>Cédula:</strong> {{ $enfermera->cedula }}</p>
                        <p><strong>Correo:</strong> {{ $enfermera->user->email }}</p>
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
                    document.getElementById('eliminar-enfermera-form').submit();
                }
            });
        }
    </script>
@endsection
