@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Información de {{ $mascota->nombre }}</h5>
                            <a href="{{ route('paciente.mascotas.index') }}" class="btn btn-sm btn-light">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Información general de la mascota -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title mb-0">Información General</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            @if($mascota->foto)
                                                <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" class="img-fluid rounded" style="max-height: 200px;">
                                            @else
                                                <img src="{{ asset('images/pet-default.png') }}" alt="Sin foto" class="img-fluid rounded" style="max-height: 200px;">
                                            @endif
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                <tr>
                                                    <th style="width: 40%;">Especie:</th>
                                                    <td>{{ $mascota->especie }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Raza:</th>
                                                    <td>{{ $mascota->raza ?? 'No especificada' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Color:</th>
                                                    <td>{{ $mascota->color ?? 'No especificado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sexo:</th>
                                                    <td>{{ $mascota->sexo ?? 'No especificado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Fecha Nacimiento:</th>
                                                    <td>
                                                        @if($mascota->fecha_nacimiento)
                                                            {{ $mascota->fecha_nacimiento->format('d/m/Y') }}
                                                            ({{ $mascota->fecha_nacimiento->age }} años)
                                                        @else
                                                            No especificada
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Peso:</th>
                                                    <td>{{ $mascota->peso ? $mascota->peso . ' kg' : 'No registrado' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Microchip:</th>
                                                    <td>{{ $mascota->microchip ?? 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Esterilizado:</th>
                                                    <td>{{ $mascota->esterilizado ? 'Sí' : 'No' }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información médica de la mascota -->
                            <div class="col-md-8 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-warning">
                                        <h5 class="card-title mb-0">Información Médica</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6 class="fw-bold">Características Especiales:</h6>
                                            <p>{{ $mascota->caracteristicas_especiales ?? 'No registradas' }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="fw-bold">Alergias Conocidas:</h6>
                                            <p>{{ $mascota->alergias ?? 'No registradas' }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="fw-bold">Condiciones Médicas:</h6>
                                            <p>{{ $mascota->condiciones_medicas ?? 'No registradas' }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="fw-bold">Medicación Actual:</h6>
                                            <p>{{ $mascota->medicacion_actual ?? 'No registrada' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Historial de vacunas -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="card-title mb-0">Historial de Vacunas</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($mascota->vacunas->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Vacuna</th>
                                                        <th>Fecha</th>
                                                        <th>Próxima</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($mascota->vacunas->sortByDesc('fecha_aplicacion') as $vacuna)
                                                        <tr>
                                                            <td>{{ $vacuna->nombre_vacuna }}</td>
                                                            <td>{{ $vacuna->fecha_aplicacion->format('d/m/Y') }}</td>
                                                            <td>
                                                                @if($vacuna->fecha_proxima)
                                                                    {{ $vacuna->fecha_proxima->format('d/m/Y') }}
                                                                    @if($vacuna->fecha_proxima->isPast())
                                                                        <span class="badge bg-danger">Vencida</span>
                                                                    @elseif($vacuna->fecha_proxima->diffInDays(now()) < 30)
                                                                        <span class="badge bg-warning text-dark">Próxima</span>
                                                                    @endif
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="alert alert-info">
                                                No hay vacunas registradas para esta mascota.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Historial de desparasitaciones -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">Historial de Desparasitaciones</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($mascota->desparasitaciones->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Medicamento</th>
                                                        <th>Fecha</th>
                                                        <th>Próxima</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($mascota->desparasitaciones->sortByDesc('fecha_aplicacion') as $desparasitacion)
                                                        <tr>
                                                            <td>{{ $desparasitacion->medicamento }}</td>
                                                            <td>{{ $desparasitacion->fecha_aplicacion->format('d/m/Y') }}</td>
                                                            <td>
                                                                @if($desparasitacion->fecha_proxima)
                                                                    {{ $desparasitacion->fecha_proxima->format('d/m/Y') }}
                                                                    @if($desparasitacion->fecha_proxima->isPast())
                                                                        <span class="badge bg-danger">Vencida</span>
                                                                    @elseif($desparasitacion->fecha_proxima->diffInDays(now()) < 30)
                                                                        <span class="badge bg-warning text-dark">Próxima</span>
                                                                    @endif
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="alert alert-info">
                                                No hay desparasitaciones registradas para esta mascota.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Historial de visitas -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        <h5 class="card-title mb-0">Historial de Visitas</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($mascota->visitas->count() > 0)
                                            <div class="accordion" id="visitasAccordion">
                                                @foreach($mascota->visitas as $index => $visita)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $visita->id }}">
                                                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $visita->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $visita->id }}">
                                                                <div class="d-flex justify-content-between align-items-center w-100">
                                                                    <div>
                                                                        <strong>{{ $visita->fecha_visita->format('d/m/Y') }}</strong> -
                                                                        {{ $visita->motivo }}
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $visita->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $visita->id }}" data-bs-parent="#visitasAccordion">
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h6 class="fw-bold">Detalles de la Visita:</h6>
                                                                        <ul class="list-group mb-3">
                                                                            <li class="list-group-item d-flex justify-content-between">
                                                                                <span>Fecha:</span>
                                                                                <span>{{ $visita->fecha_visita->format('d/m/Y') }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between">
                                                                                <span>Peso:</span>
                                                                                <span>{{ $visita->peso ? $visita->peso . ' kg' : 'No registrado' }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between">
                                                                                <span>Temperatura:</span>
                                                                                <span>{{ $visita->temperatura ? $visita->temperatura . ' °C' : 'No registrada' }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <h6 class="fw-bold">Motivo de la Visita:</h6>
                                                                            <p>{{ $visita->motivo }}</p>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <h6 class="fw-bold">Examen Físico:</h6>
                                                                            <p>{{ $visita->examen_fisico ?? 'No registrado' }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="fw-bold">Diagnóstico:</h6>
                                                                        <p>{{ $visita->diagnostico }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="fw-bold">Tratamiento:</h6>
                                                                        <p>{{ $visita->tratamiento ?? 'No prescrito' }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="fw-bold">Observaciones:</h6>
                                                                        <p>{{ $visita->observaciones ?? 'Sin observaciones' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="alert alert-info">
                                                No hay visitas registradas para esta mascota.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
