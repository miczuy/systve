@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Editar Mascota: {{ $mascota->nombre }}</h5>
                        <a href="{{ route('admin.mascotas.show', $mascota) }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver a detalles
                        </a>
                    </div>

                    <!-- Tabs para organizar la edición -->
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="mascotaTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                                    <i class="fas fa-info-circle"></i> Información
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vacunas-tab" data-bs-toggle="tab" data-bs-target="#vacunas" type="button" role="tab" aria-controls="vacunas" aria-selected="false">
                                    <i class="fas fa-syringe"></i> Vacunas
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="desparasitaciones-tab" data-bs-toggle="tab" data-bs-target="#desparasitaciones" type="button" role="tab" aria-controls="desparasitaciones" aria-selected="false">
                                    <i class="fas fa-pills"></i> Desparasitaciones
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="visitas-tab" data-bs-toggle="tab" data-bs-target="#visitas" type="button" role="tab" aria-controls="visitas" aria-selected="false">
                                    <i class="fas fa-stethoscope"></i> Visitas
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content pt-4" id="mascotaTabsContent">
                            <!-- Pestaña de información básica -->
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                <form action="{{ route('admin.mascotas.update', $mascota) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="paciente_id" class="form-label">Dueño <span class="text-danger">*</span></label>
                                            <select name="paciente_id" id="paciente_id" class="form-select @error('paciente_id') is-invalid @enderror" required>
                                                <option value="">Seleccione un paciente</option>
                                                @foreach($pacientes as $paciente)
                                                    <option value="{{ $paciente->id }}" {{ (old('paciente_id', $mascota->paciente_id) == $paciente->id) ? 'selected' : '' }}>
                                                        {{ $paciente->apellidos }}, {{ $paciente->nombres }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('paciente_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="nombre" class="form-label">Nombre de la Mascota <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $mascota->nombre) }}" required>
                                            @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="especie" class="form-label">Especie <span class="text-danger">*</span></label>
                                            <select name="especie" id="especie" class="form-select @error('especie') is-invalid @enderror" required>
                                                <option value="">Seleccione una especie</option>
                                                <option value="Perro" {{ old('especie', $mascota->especie) == 'Perro' ? 'selected' : '' }}>Perro</option>
                                                <option value="Gato" {{ old('especie', $mascota->especie) == 'Gato' ? 'selected' : '' }}>Gato</option>
                                                <option value="Ave" {{ old('especie', $mascota->especie) == 'Ave' ? 'selected' : '' }}>Ave</option>
                                                <option value="Conejo" {{ old('especie', $mascota->especie) == 'Conejo' ? 'selected' : '' }}>Conejo</option>
                                                <option value="Otro" {{ old('especie', $mascota->especie) == 'Otro' ? 'selected' : '' }}>Otro</option>
                                            </select>
                                            @error('especie')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="raza" class="form-label">Raza</label>
                                            <input type="text" class="form-control @error('raza') is-invalid @enderror" id="raza" name="raza" value="{{ old('raza', $mascota->raza) }}">
                                            @error('raza')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="color" class="form-label">Color</label>
                                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $mascota->color) }}">
                                            @error('color')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="sexo" class="form-label">Sexo</label>
                                            <select name="sexo" id="sexo" class="form-select @error('sexo') is-invalid @enderror">
                                                <option value="">No especificado</option>
                                                <option value="Macho" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'selected' : '' }}>Macho</option>
                                                <option value="Hembra" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                                            </select>
                                            @error('sexo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('Y-m-d') : '') }}">
                                            @error('fecha_nacimiento')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="peso" class="form-label">Peso (kg)</label>
                                            <input type="number" step="0.01" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" value="{{ old('peso', $mascota->peso) }}">
                                            @error('peso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="microchip" class="form-label">Número de Microchip</label>
                                            <input type="text" class="form-control @error('microchip') is-invalid @enderror" id="microchip" name="microchip" value="{{ old('microchip', $mascota->microchip) }}">
                                            @error('microchip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                                            <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                                                <option value="Activo" {{ old('estado', $mascota->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                                                <option value="Inactivo" {{ old('estado', $mascota->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                <option value="Fallecido" {{ old('estado', $mascota->estado) == 'Fallecido' ? 'selected' : '' }}>Fallecido</option>
                                            </select>
                                            @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="esterilizado" name="esterilizado" value="1" {{ old('esterilizado', $mascota->esterilizado) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="esterilizado">
                                                    Esterilizado/Castrado
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="caracteristicas_especiales" class="form-label">Características Especiales</label>
                                            <textarea class="form-control @error('caracteristicas_especiales') is-invalid @enderror" id="caracteristicas_especiales" name="caracteristicas_especiales" rows="2">{{ old('caracteristicas_especiales', $mascota->caracteristicas_especiales) }}</textarea>
                                            @error('caracteristicas_especiales')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="alergias" class="form-label">Alergias Conocidas</label>
                                            <textarea class="form-control @error('alergias') is-invalid @enderror" id="alergias" name="alergias" rows="2">{{ old('alergias', $mascota->alergias) }}</textarea>
                                            @error('alergias')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="condiciones_medicas" class="form-label">Condiciones Médicas</label>
                                            <textarea class="form-control @error('condiciones_medicas') is-invalid @enderror" id="condiciones_medicas" name="condiciones_medicas" rows="2">{{ old('condiciones_medicas', $mascota->condiciones_medicas) }}</textarea>
                                            @error('condiciones_medicas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="medicacion_actual" class="form-label">Medicación Actual</label>
                                            <textarea class="form-control @error('medicacion_actual') is-invalid @enderror" id="medicacion_actual" name="medicacion_actual" rows="2">{{ old('medicacion_actual', $mascota->medicacion_actual) }}</textarea>
                                            @error('medicacion_actual')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            <label for="foto" class="form-label">Foto de la Mascota</label>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                                            <small class="form-text text-muted">Formatos permitidos: JPG, PNG. Máximo 2MB. Deje en blanco para mantener la foto actual.</small>
                                            @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 text-center">
                                            @if($mascota->foto)
                                                <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" class="img-thumbnail mt-2" style="max-height: 100px;">
                                            @else
                                                <div class="alert alert-info mt-2">Sin foto</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <a href="{{ route('admin.mascotas.show', $mascota) }}" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Actualizar Información</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Pestaña de vacunas -->
                            <div class="tab-pane fade" id="vacunas" role="tabpanel" aria-labelledby="vacunas-tab">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5>Historial de Vacunas</h5>
                                    @can('admin.vacunas.store')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#vacunaModal">
                                            <i class="fas fa-plus"></i> Añadir Vacuna
                                        </button>
                                    @endcan
                                </div>

                                <div id="vacunas-container">
                                    @if($mascota->vacunas->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Vacuna</th>
                                                    <th>Fecha</th>
                                                    <th>Próxima</th>
                                                    <th>Notas</th>
                                                    <th>Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($mascota->vacunas->sortByDesc('fecha_aplicacion') as $vacuna)
                                                    <tr id="vacuna-{{ $vacuna->id }}">
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
                                                        <td>{{ Str::limit($vacuna->notas, 30) }}</td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm">
                                                                <button type="button" class="btn btn-info btn-sm editar-vacuna"
                                                                        data-id="{{ $vacuna->id }}"
                                                                        data-nombre="{{ $vacuna->nombre_vacuna }}"
                                                                        data-fecha="{{ $vacuna->fecha_aplicacion->format('Y-m-d') }}"
                                                                        data-proxima="{{ $vacuna->fecha_proxima ? $vacuna->fecha_proxima->format('Y-m-d') : '' }}"
                                                                        data-lote="{{ $vacuna->lote }}"
                                                                        data-veterinario="{{ $vacuna->veterinario }}"
                                                                        data-notas="{{ $vacuna->notas }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                @can('admin.vacunas.destroy')
                                                                    <button type="button" class="btn btn-danger btn-sm eliminar-vacuna" data-id="{{ $vacuna->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                            </div>
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

                            <!-- Pestaña de desparasitaciones -->
                            <div class="tab-pane fade" id="desparasitaciones" role="tabpanel" aria-labelledby="desparasitaciones-tab">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5>Historial de Desparasitaciones</h5>
                                    @can('admin.desparasitaciones.store')
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#desparasitacionModal">
                                            <i class="fas fa-plus"></i> Añadir Desparasitación
                                        </button>
                                    @endcan
                                </div>

                                <div id="desparasitaciones-container">
                                    @if($mascota->desparasitaciones->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Medicamento</th>
                                                    <th>Fecha</th>
                                                    <th>Próxima</th>
                                                    <th>Peso</th>
                                                    <th>Notas</th>
                                                    <th>Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($mascota->desparasitaciones->sortByDesc('fecha_aplicacion') as $desparasitacion)
                                                    <tr id="desparasitacion-{{ $desparasitacion->id }}">
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
                                                        <td>{{ $desparasitacion->peso_aplicacion }} kg</td>
                                                        <td>{{ Str::limit($desparasitacion->notas, 30) }}</td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm">
                                                                <button type="button" class="btn btn-info btn-sm editar-desparasitacion"
                                                                        data-id="{{ $desparasitacion->id }}"
                                                                        data-medicamento="{{ $desparasitacion->medicamento }}"
                                                                        data-fecha="{{ $desparasitacion->fecha_aplicacion->format('Y-m-d') }}"
                                                                        data-proxima="{{ $desparasitacion->fecha_proxima ? $desparasitacion->fecha_proxima->format('Y-m-d') : '' }}"
                                                                        data-peso="{{ $desparasitacion->peso_aplicacion }}"
                                                                        data-dosis="{{ $desparasitacion->dosis }}"
                                                                        data-notas="{{ $desparasitacion->notas }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                @can('admin.desparasitaciones.destroy')
                                                                    <button type="button" class="btn btn-danger btn-sm eliminar-desparasitacion" data-id="{{ $desparasitacion->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                @endcan
                                                            </div>
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

                            <!-- Pestaña de visitas -->
                            <div class="tab-pane fade" id="visitas" role="tabpanel" aria-labelledby="visitas-tab">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5>Historial de Visitas</h5>
                                    @can('admin.visitas.store')
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#visitaModal">
                                            <i class="fas fa-plus"></i> Añadir Visita
                                        </button>
                                    @endcan
                                </div>

                                <div id="visitas-container">
                                    @if($mascota->visitas->count() > 0)
                                        <div class="accordion" id="visitasAccordion">
                                            @foreach($mascota->visitas->sortByDesc('fecha_visita') as $index => $visita)
                                                <div class="accordion-item" id="visita-{{ $visita->id }}">
                                                    <h2 class="accordion-header" id="heading{{ $visita->id }}">
                                                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $visita->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $visita->id }}">
                                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                                <div>
                                                                    <strong>{{ $visita->fecha_visita->format('d/m/Y') }}</strong> -
                                                                    {{ $visita->motivo_consulta }}
                                                                </div>
                                                                <div class="ms-3">
                                                                <span class="badge bg-{{ $visita->estado === 'Completada' ? 'success' : ($visita->estado === 'Programada' ? 'info' : 'danger') }}">
                                                                    {{ $visita->estado }}
                                                                </span>
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
                                                                            <span>Fecha y hora:</span>
                                                                            <span>{{ $visita->fecha_visita->format('d/m/Y') }} {{ $visita->hora_visita }}</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                            <span>Doctor:</span>
                                                                            <span>{{ $visita->doctor->nombre ?? 'No asignado' }}</span>
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
                                                                        <h6 class="fw-bold">Motivo de la Consulta:</h6>
                                                                        <p>{{ $visita->motivo_consulta }}</p>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <h6 class="fw-bold">Síntomas:</h6>
                                                                        <p>{{ $visita->sintomas ?? 'No registrados' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h6 class="fw-bold">Diagnóstico:</h6>
                                                                    <p>{{ $visita->diagnostico ?? 'Pendiente' }}</p>
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

                                                            @if($visita->fecha_seguimiento)
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="fw-bold">Fecha de Seguimiento:</h6>
                                                                        <p>{{ $visita->fecha_seguimiento->format('d/m/Y') }}</p>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <div class="row">
                                                                <div class="col-md-12 text-end">
                                                                    <div class="btn-group">
                                                                        @can('admin.visitas.update')
                                                                            <button type="button" class="btn btn-primary btn-sm editar-visita"
                                                                                    data-id="{{ $visita->id }}"
                                                                                    data-fecha="{{ $visita->fecha_visita->format('Y-m-d') }}"
                                                                                    data-hora="{{ $visita->hora_visita }}"
                                                                                    data-doctor="{{ $visita->doctor_id }}"
                                                                                    data-motivo="{{ $visita->motivo_consulta }}"
                                                                                    data-peso="{{ $visita->peso }}"
                                                                                    data-temperatura="{{ $visita->temperatura }}"
                                                                                    data-sintomas="{{ $visita->sintomas }}"
                                                                                    data-diagnostico="{{ $visita->diagnostico }}"
                                                                                    data-tratamiento="{{ $visita->tratamiento }}"
                                                                                    data-observaciones="{{ $visita->observaciones }}"
                                                                                    data-seguimiento="{{ $visita->fecha_seguimiento ? $visita->fecha_seguimiento->format('Y-m-d') : '' }}"
                                                                                    data-estado="{{ $visita->estado }}">
                                                                                <i class="fas fa-edit"></i> Editar
                                                                            </button>
                                                                        @endcan

                                                                        @can('admin.visitas.destroy')
                                                                            <button type="button" class="btn btn-danger btn-sm eliminar-visita" data-id="{{ $visita->id }}">
                                                                                <i class="fas fa-trash"></i> Eliminar
                                                                            </button>
                                                                        @endcan
                                                                    </div>
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

    <!-- Modal para Vacunas -->
    <div class="modal fade" id="vacunaModal" tabindex="-1" aria-labelledby="vacunaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vacunaModalLabel">Registrar Vacuna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="vacunaForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="vacuna_id" name="vacuna_id">
                        <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                        <div class="mb-3">
                            <label for="nombre_vacuna" class="form-label">Nombre de la Vacuna <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre_vacuna" name="nombre_vacuna" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_aplicacion" class="form-label">Fecha de Aplicación <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="fecha_aplicacion" name="fecha_aplicacion" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_proxima" class="form-label">Fecha Próxima Dosis</label>
                            <input type="date" class="form-control" id="fecha_proxima" name="fecha_proxima">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="lote" class="form-label">Lote</label>
                            <input type="text" class="form-control" id="lote" name="lote">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="veterinario" class="form-label">Veterinario</label>
                            <input type="text" class="form-control" id="veterinario" name="veterinario">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="notas" class="form-label">Notas</label>
                            <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para Desparasitaciones -->
    <div class="modal fade" id="desparasitacionModal" tabindex="-1" aria-labelledby="desparasitacionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="desparasitacionModalLabel">Registrar Desparasitación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="desparasitacionForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="desparasitacion_id" name="desparasitacion_id">
                        <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                        <div class="mb-3">
                            <label for="medicamento" class="form-label">Medicamento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="medicamento" name="medicamento" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_aplicacion_desp" class="form-label">Fecha de Aplicación <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="fecha_aplicacion_desp" name="fecha_aplicacion" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_proxima_desp" class="form-label">Fecha Próxima Dosis</label>
                            <input type="date" class="form-control" id="fecha_proxima_desp" name="fecha_proxima">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="peso_aplicacion" class="form-label">Peso (kg) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control" id="peso_aplicacion" name="peso_aplicacion" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-md-6">
                                <label for="dosis" class="form-label">Dosis</label>
                                <input type="text" class="form-control" id="dosis" name="dosis">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notas_desp" class="form-label">Notas</label>
                            <textarea class="form-control" id="notas_desp" name="notas" rows="3"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Contenedor para mensajes toast -->
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3"></div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Configuración global para AJAX
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Al cambiar de pestaña, recordar la última tab activa
                $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                    localStorage.setItem('mascotaActiveTab', $(e.target).attr('href'));
                });

                // Recuperar la última pestaña activa
                var activeTab = localStorage.getItem('mascotaActiveTab');
                if(activeTab){
                    $('#mascotaTabs a[href="' + activeTab + '"]').tab('show');
                }

                // Función para mostrar mensajes toast
                function showToast(type, message) {
                    const toastHtml = `
                <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            `;

                    $('#toast-container').append(toastHtml);
                    const toastElement = $('#toast-container .toast').last();
                    const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
                    toast.show();

                    // Autodestruir después de ser ocultado
                    toastElement.on('hidden.bs.toast', function() {
                        $(this).remove();
                    });
                }

                // Función para limpiar errores en un formulario
                function clearErrors(form) {
                    form.find('.is-invalid').removeClass('is-invalid');
                    form.find('.invalid-feedback').empty();
                }

                // Función para mostrar errores en un formulario
                function showErrors(form, errors) {
                    $.each(errors, function(field, messages) {
                        const input = form.find('[name="' + field + '"]');
                        input.addClass('is-invalid');
                        input.siblings('.invalid-feedback').html(messages[0]);
                    });
                }

                // Formulario de Vacunas
                $('#vacunaForm').submit(function(e) {
                    e.preventDefault();
                    clearErrors($(this));

                    const vacunaId = $('#vacuna_id').val();
                    const isUpdate = vacunaId !== '';
                    const url = isUpdate ? `/admin/vacunas/${vacunaId}` : '/admin/vacunas';
                    const method = isUpdate ? 'PUT' : 'POST';

                    // Deshabilitar botón durante el envío
                    const submitBtn = $(this).find('button[type="submit"]');
                    const originalText = submitBtn.html();
                    submitBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...');
                    submitBtn.prop('disabled', true);

                    $.ajax({
                        url: url,
                        type: method,
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response) {
                            $('#vacunaModal').modal('hide');

                            showToast('success', isUpdate ? 'Vacuna actualizada correctamente' : 'Vacuna registrada correctamente');

                            // Recargar la tabla de vacunas
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        },
                        error: function(xhr) {
                            submitBtn.html(originalText);
                            submitBtn.prop('disabled', false);

                            if (xhr.status === 422) {
                                showErrors($('#vacunaForm'), xhr.responseJSON.errors);
                            } else {
                                showToast('error', 'Ha ocurrido un error. Por favor, inténtalo de nuevo.');
                            }
                        }
                    });
                });

                // Editar vacuna
                $(document).on('click', '.editar-vacuna', function() {
                    const vacunaId = $(this).data('id');
                    $('#vacuna_id').val(vacunaId);
                    $('#nombre_vacuna').val($(this).data('nombre'));
                    $('#fecha_aplicacion').val($(this).data('fecha'));
                    $('#fecha_proxima').val($(this).data('proxima'));
                    $('#lote').val($(this).data('lote'));
                    $('#veterinario').val($(this).data('veterinario'));
                    $('#notas').val($(this).data('notas'));

                    $('#vacunaModalLabel').text('Editar Vacuna');
                    $('#vacunaModal').modal('show');
                });

                // Eliminar vacuna
                $(document).on('click', '.eliminar-vacuna', function() {
                    if (confirm('¿Está seguro de eliminar esta vacuna?')) {
                        const vacunaId = $(this).data('id');

                        $.ajax({
                            url: `/admin/vacunas/${vacunaId}`,
                            type: 'DELETE',
                            dataType: 'json',
                            success: function(response) {
                                $(`#vacuna-${vacunaId}`).remove();
                                showToast('success', 'Vacuna eliminada correctamente');

                                // Si no quedan vacunas, mostrar mensaje
                                if ($('#vacunas-container tbody tr').length === 0) {
                                    $('#vacunas-container').html('<div class="alert alert-info">No hay vacunas registradas para esta mascota.</div>');
                                }
                            },
                            error: function() {
                                showToast('error', 'Ha ocurrido un error al eliminar la vacuna');
                            }
                        });
                    }
                });

                // Restablecer formulario al abrir modal de vacuna
                $('#vacunaModal').on('show.bs.modal', function() {
                    if ($('#vacuna_id').val() === '') {
                        $('#vacunaModalLabel').text('Registrar Vacuna');
                        $('#vacunaForm')[0].reset();
                    }
                });

                // Limpiar formulario al cerrar modal
                $('#vacunaModal').on('hidden.bs.modal', function() {
                    $('#vacuna_id').val('');
                    clearErrors($('#vacunaForm'));
                    $('#vacunaForm')[0].reset();
                });

                // Formulario de Desparasitaciones (similar al de vacunas)
                $('#desparasitacionForm').submit(function(e) {
                    e.preventDefault();
                    clearErrors($(this));

                    const desparasitacionId = $('#desparasitacion_id').val();
                    const isUpdate = desparasitacionId !== '';
                    const url = isUpdate ? `/admin/desparasitaciones/${desparasitacionId}` : '/admin/desparasitaciones';
                    const method = isUpdate ? 'PUT' : 'POST';

                    const submitBtn = $(this).find('button[type="submit"]');
                    const originalText = submitBtn.html();
                    submitBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...');
                    submitBtn.prop('disabled', true);

                    $.ajax({
                        url: url,
                        type: method,
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response) {
                            $('#desparasitacionModal').modal('hide');

                            showToast('success', isUpdate ? 'Desparasitación actualizada correctamente' : 'Desparasitación registrada correctamente');

                            // Recargar la página después de un breve retraso
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        },
                        error: function(xhr) {
                            submitBtn.html(originalText);
                            submitBtn.prop('disabled', false);

                            if (xhr.status === 422) {
                                showErrors($('#desparasitacionForm'), xhr.responseJSON.errors);
                            } else {
                                showToast('error', 'Ha ocurrido un error. Por favor, inténtalo de nuevo.');
                            }
                        }
                    });
                });

                // Editar desparasitación
                $(document).on('click', '.editar-desparasitacion', function() {
                    const desparasitacionId = $(this).data('id');
                    $('#desparasitacion_id').val(desparasitacionId);
                    $('#medicamento').val($(this).data('medicamento'));
                    $('#fecha_aplicacion_desp').val($(this).data('fecha'));
                    $('#fecha_proxima_desp').val($(this).data('proxima'));
                    $('#peso_aplicacion').val($(this).data('peso'));
                    $('#dosis').val($(this).data('dosis'));
                    $('#notas_desp').val($(this).data('notas'));

                    $('#desparasitacionModalLabel').text('Editar Desparasitación');
                    $('#desparasitacionModal').modal('show');
                });

                // Eliminar desparasitación
                $(document).on('click', '.eliminar-desparasitacion', function() {
                    if (confirm('¿Está seguro de eliminar esta desparasitación?')) {
                        const desparasitacionId = $(this).data('id');

                        $.ajax({
                            url: `/admin/desparasitaciones/${desparasitacionId}`,
                            type: 'DELETE',
                            dataType: 'json',
                            success: function(response) {
                                $(`#desparasitacion-${desparasitacionId}`).remove();
                                showToast('success', 'Desparasitación eliminada correctamente');

                                // Si no quedan desparasitaciones, mostrar mensaje
                                if ($('#desparasitaciones-container tbody tr').length === 0) {
                                    $('#desparasitaciones-container').html('<div class="alert alert-info">No hay desparasitaciones registradas para esta mascota.</div>');
                                }
                            },
                            error: function() {
                                showToast('error', 'Ha ocurrido un error al eliminar la desparasitación');
                            }
                        });
                    }
                });

                // Restablecer formulario al abrir modal
                $('#desparasitacionModal').on('show.bs.modal', function() {
                    if ($('#desparasitacion_id').val() === '') {
                        $('#desparasitacionModalLabel').text('Registrar Desparasitación');
                        $('#desparasitacionForm')[0].reset();
                    }
                });

                // Limpiar formulario al cerrar modal
                $('#desparasitacionModal').on('hidden.bs.modal', function() {
                    $('#desparasitacion_id').val('');
                    clearErrors($('#desparasitacionForm'));
                    $('#desparasitacionForm')[0].reset();
                });

                // También implementar la lógica para las visitas de manera similar...
            });
        </script>
    @endpush
@endsection
