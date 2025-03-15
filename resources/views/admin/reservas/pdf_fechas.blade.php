<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Clínico - Citas Médicas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Estilo general */
        body {
            border-radius: 50px;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            background-color: #faf7f2;
            color: #333;
        }

        /* Encabezado */
        header {
            background: linear-gradient(to right, #b7791f, #d4af37);
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid #7c6c4b;
        }

        header h1 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        header p {
            font-size: 16px;
            margin: 5px 0;
        }

        header .divider {
            width: 100px;
            height: 4px;
            background: #f9d976;
            margin: 20px auto;
            border-radius: 2px;
        }

        /* Contenedor principal */
        main {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: #fff;
        }

        /* Sección de fechas */
        .date-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .date-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #b7791f;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
            color: #fcfcff;
            margin: 0 10px;
            text-align: center;
        }

        .date-card span {
            flex: 1;
            text-align: center;
        }

        .separator {
            flex: 0 0 50px; /* Espacio entre las fechas */
        }

        .date-card:first-child {
            margin-left: 0;
        }

        .date-card:last-child {
            margin-right: 0;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
            border-radius: 12px;
            overflow: hidden;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #b7791f;
            color: white;
            font-size: 12px;
        }

        table td {
            border-bottom: 1px solid #e5e7eb;
        }

        table tr:nth-child(even) {
            background: #f8f3eb;
        }

        table tr:hover {
            background: #f9e3c9;
            transition: background 0.3s ease;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .status.pending {
            background-color: #fef3c7;
            color: #b45309;
        }

        .status.completed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status.canceled {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #666;
        }

        footer {
            position: fixed; /* Fija el pie de página en la ventana */
            bottom: 0; /* Coloca el pie de página en la parte inferior */
            left: 0; /* Alinea a la izquierda */
            right: 0; /* Alinea a la derecha */
            background: #7c6c4b;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 0 0 12px 12px;
            font-size: 14px;
        }

        footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<header>
    <h1>{{ $configuracion->nombre_clinica ?? 'Huellitas del Corazón' }}</h1>
    <p>{{ $configuracion->direccion ?? '' }} | Tel: {{ $configuracion->telefono ?? '+56 9 1234 5678' }}</p>
    <p>{{ $configuracion->correo ?? '' }}</p>
    <div class="divider"></div>
    <p>Reporte generado el {{ now()->format('d/m/Y H:i') }}</p>
</header>

<main>
    <!-- Sección de fechas -->
    <div class="date-section">
        <div class="date-card">
            <span class="date-start">Fecha Inicio: {{ $fecha_inicio }}</span>
            <span class="separator"></span>
            <span class="date-end">Fecha Fin: {{ $fecha_fin }}</span>
        </div>
    </div>

    <!-- Tabla -->
    <table>
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Especialidad</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @forelse($eventos as $evento)
            <tr>
                <td>{{ $evento->start->format('d/m/Y') }}</td>
                <td>{{ $evento->start->format('H:i') }}</td>
                <td>{{ $evento->user->name ?? '' }}</td>
                <td>{{ $evento->doctor->nombres ?? '' }}</td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                    @if($evento->doctor && $evento->doctor->specialties->isNotEmpty())
                        @foreach($evento->doctor->specialties as $specialty)
                            <span class="block">{{ $specialty->nombre }}</span>
                        @endforeach
                    @else
                        <span class="text-gray-400">Sin especialidad</span>
                    @endif
                </td>
                <td>
                    <span class="status {{ strtolower($evento->estado) }}">{{ $evento->estado }}</span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="no-data">No se encontraron citas en el período seleccionado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</main>

<footer>
    <p>{{ $configuracion->nombre_clinica ?? 'Centro Veterinario Huellitas del Corazon' }} - Documento confidencial</p>
    <p>Reporte generado automáticamente - {{ now()->format('d/m/Y H:i') }}</p>
</footer>
</body>
</html>
