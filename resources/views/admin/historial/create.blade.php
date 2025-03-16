@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Crear nuevo historial</h1>
            <a href="{{ route('admin.historial.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al listado
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.historial.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de paciente *</label>
                        <div class="mt-2 space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="tipo_paciente" value="Humano" checked>
                                <span class="ml-2">Paciente humano</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="tipo_paciente" value="Mascota">
                                <span class="ml-2">Mascota</span>
                            </label>
                        </div>
                    </div>

                    <div id="select-paciente" class="mb-6">
                        <label for="paciente_id" class="block text-gray-700 text-sm font-bold mb-2">Paciente *</label>
                        <select name="paciente_id" id="paciente_id" class="form-select block w-full mt-1">
                            <option value="">Seleccione un paciente</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }} - {{ $paciente->cedula }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="select-mascota" class="mb-6 hidden">
                        <label for="mascota_id" class="block text-gray-700 text-sm font-bold mb-2">Mascota *</label>
                        <select name="mascota_id" id="mascota_id" class="form-select block w-full mt-1">
                            <option value="">Seleccione una mascota</option>
                            @foreach($mascotas as $mascota)
                                <option value="{{ $mascota->id }}">{{ $mascota->nombre }} - {{ $mascota->especie }} (Dueño: {{ $mascota->paciente->nombres }} {{ $mascota->paciente->apellidos }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="doctor_id" class="block text-gray-700 text-sm font-bold mb-2">Doctor *</label>
                        <select name="doctor_id" id="doctor_id" class="form-select block w-full mt-1" required>
                            <option value="">Seleccione un doctor</option>
                            @foreach($doctores as $doctor)
                                <option value="{{ $doctor->id }}">Dr. {{ $doctor->nombres }} {{ $doctor->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="fecha_visita" class="block text-gray-700 text-sm font-bold mb-2">Fecha de visita *</label>
                        <input type="date" name="fecha_visita" id="fecha_visita" class="form-input block w-full mt-1" required>
                    </div>

                    <div class="mb-6">
                        <label for="detalle" class="block text-gray-700 text-sm font-bold mb-2">Detalle *</label>
                        <textarea name="detalle" id="detalle" rows="6" class="form-textarea block w-full mt-1" required placeholder="Ingrese el detalle de la consulta, síntomas, diagnóstico, tratamiento, etc."></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Guardar historial
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipoPacienteInputs = document.querySelectorAll('input[name="tipo_paciente"]');
            const selectPaciente = document.getElementById('select-paciente');
            const selectMascota = document.getElementById('select-mascota');

            tipoPacienteInputs.forEach(input => {
                input.addEventListener('change', function() {
                    if (this.value === 'Humano') {
                        selectPaciente.classList.remove('hidden');
                        selectMascota.classList.add('hidden');
                        document.getElementById('mascota_id').value = '';
                    } else {
                        selectPaciente.classList.add('hidden');
                        selectMascota.classList.remove('hidden');
                        document.getElementById('paciente_id').value = '';
                    }
                });
            });
        });
    </script>
@endsection
