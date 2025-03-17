@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Mis Mascotas</h5>
                    </div>

                    <div class="card-body">
                        @if($mascotas->count() > 0)
                            <div class="row">
                                @foreach($mascotas as $mascota)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">{{ $mascota->nombre }}</h5>
                                            </div>

                                            <div class="text-center p-3">
                                                @if($mascota->foto)
                                                    <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" class="img-fluid rounded" style="max-height: 150px;">
                                                @else
                                                    <img src="{{ asset('images/pet-default.png') }}" alt="Sin foto" class="img-fluid rounded" style="max-height: 150px;">
                                                @endif
                                            </div>

                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <strong>Especie:</strong> {{ $mascota->especie }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Raza:</strong> {{ $mascota->raza ?? 'No especificada' }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Edad:</strong>
                                                        @if($mascota->fecha_nacimiento)
                                                            {{ $mascota->fecha_nacimiento->age }} años
                                                        @else
                                                            No registrada
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-footer bg-transparent text-center">
                                                <a href="{{ route('paciente.mascotas.show', $mascota) }}" class="btn btn-primary">
                                                    Ver Detalles
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <p>Aún no tienes mascotas registradas.</p>
                                <p>Comunícate con la clínica para registrar a tus mascotas.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
