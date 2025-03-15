<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Médico: Listado de Citas</title>
    <style>
        /* Configuración optimizada para A4 vertical */
        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #1e293b;
            font-size: 10pt;
            background-color: white;
            width: 21cm; /* Ancho A4 */
            height: 29.7cm; /* Alto A4 */
            position: relative;
        }

        /* Header optimizado */
        .header {
            background-color: #1e40af;
            color: white;
            padding: 15px 20px;
            border-bottom: 4px solid #3b82f6;
            height: 60px;
        }

        .header-content:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Logo y título optimizados */
        .logo-section {
            float: left;
            width: 60%;
        }

        .logo-box {
            background-color: white;
            width: 40px;
            height: 40px;
            float: left;
            text-align: center;
            line-height: 40px;
            margin-right: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            margin-top: 15px;
            overflow: hidden; /* Para asegurarse que la imagen no sobresalga */
        }

        .logo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .logo-text {
            margin-left: 50px;
            float: left;
            margin-top: 15px;
        }

        .logo-text h1 {
            font-size: 18px;
            margin: 0 0 3px 0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .logo-text p {
            font-size: 11px;
            color: #bfdbfe;
            margin: 0;
        }

        /* Información del documento */
        .document-info {
            float: right;
            width: 35%;
            padding: 8px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            text-align: right;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .document-info h2 {
            font-size: 14px;
            margin: 0 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .document-info p {
            font-size: 11px;
            color: #e0f2fe;
            margin: 0 0 4px 0;
        }

        .status-text {
            display: inline-block;
            background-color: #3b82f6;
            font-size: 9px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 12px;
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        /* Contenido principal */
        .content {
            padding: 15px 20px;
            margin-bottom: 200px; /* Espacio para el área fija inferior */
        }

        /* Título de sección */
        .title-section {
            text-align: center;
            margin: 15px 0 20px 0;
            background-color: #f0f9ff;
            padding: 10px 15px;
            border-radius: 8px;
            border-left: 5px solid #3b82f6;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .title-section h2 {
            font-size: 16px;
            color: #1e3a8a;
            margin: 0 0 5px 0;
        }

        .title-section p {
            color: #475569;
            font-size: 12px;
            margin: 0 0 5px 0;
        }

        .title-accent {
            display: block;
            width: 150px;
            height: 3px;
            background-color: #3b82f6;
            border-radius: 2px;
            margin-top: 5px;
            margin-left: 290px;
        }

        /* Tabla optimizada */
        .table-container {
            width: 100%;
            margin-bottom: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #1e40af;
            color: white;
        }

        th {
            padding: 8px 10px;
            text-align: left;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        td {
            padding: 8px 10px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 10px;
            vertical-align: middle;
        }

        tr:nth-child(even) {
            background-color: #f0f9ff;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Elementos específicos de la tabla */
        .patient-id-cell {
            text-align: center;
        }

        .patient-info-cell {
            text-align: center;
        }

        .patient-name {
            font-weight: 600;
            color: #1e40af;
            font-size: 11px;
            margin-bottom: 3px;
            display: block;
        }

        .patient-title {
            color: #ffffff;
            background-color: #60a5fa;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 9px;
            display: inline-block;
        }

        .patient-id {
            display: inline-block;
            background-color: #dbeafe;
            color: #1e40af;
            font-weight: bold;
            width: 22px;
            height: 22px;
            line-height: 18px;
            text-align: center;
            border-radius: 50%;
        }

        .email-text {
            display: block;
            background-color: #e0f2fe;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 9px;
            color: #0369a1;
            margin-top: 3px;
        }

        .info-badge {
            display: inline-block;
            background-color: #dbeafe;
            color: #1e40af;
            font-size: 9px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 12px;
            margin-bottom: 3px;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .highlight-text {
            background-color: #dbeafe;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
            color: #1e40af;
        }

        /* Área fija inferior */
        .fixed-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px 20px;
        }

        /* Tarjetas de estadísticas */
        .stats-row {
            margin-bottom: 15px;
        }

        .stats-row:after {
            content: "";
            display: table;
            clear: both;
        }

        .stat-column {
            float: left;
            width: 23%;
            margin: 0 1%;
            box-sizing: border-box;
        }

        .stat-box {
            border-radius: 6px;
            padding: 8px;
            text-align: center;
            height: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .stat-blue {
            background-color: #dbeafe;
            border: 1px solid #60a5fa;
            color: #1e40af;
        }

        .stat-purple {
            background-color: #ede9fe;
            border: 1px solid #a78bfa;
            color: #5b21b6;
        }

        .stat-green {
            background-color: #dcfce7;
            border: 1px solid #4ade80;
            color: #15803d;
        }

        .stat-amber {
            background-color: #fef3c7;
            border: 1px solid #fbbf24;
            color: #92400e;
        }

        .stat-label {
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 0px;
            display: block;
        }

        .stat-value {
            font-size: 14px;
            font-weight: 700;
            display: block;
        }

        /* Membrete optimizado */
        .membrete {
            text-align: center;
            font-size: 10px;
            color: #1e3a8a;
            line-height: 1.4;
            padding: 10px;
            background-color: #f0f9ff;
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .membrete p {
            margin: 0 0 2px 0;
        }

        .membrete strong {
            color: #1e40af;
            font-size: 11px;
        }

        /* Footer optimizado */
        .footer {
            padding: 10px;
            color: #ffffff;
            font-size: 9px;
            text-align: center;
            background-color: #1e3a8a;
            border-top: 3px solid #3b82f6;
        }

        .footer p {
            margin: 0 0 2px 0;
        }

        /* Marca de agua */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 70px;
            color: rgba(59, 130, 246, 0.04);
            font-weight: bold;
            z-index: -1;
        }
    </style>
</head>
<body>
<!-- Marca de agua -->
<div class="watermark">CONFIDENCIAL</div>

<!-- Header optimizado -->
<div class="header">
    <div class="header-content">
        <!-- Logo y nombre -->
        <div class="logo-section">
            <div class="logo-box">
                @if(isset($configuracion) && $configuracion->logo)
                    <!-- Para PDF con DomPDF (recomendado) -->
                    @php
                        $logoPath = storage_path('app/public/'.$configuracion->logo);
                        $logoBase64 = '';
                        if (file_exists($logoPath)) {
                            $logoBase64 = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($logoPath));
                        }
                    @endphp
                    @if($logoBase64)
                        <img src="{{ $logoBase64 }}" alt="Logo">
                    @else
                        <div class="cross-icon"></div>
                    @endif
                @else
                    <div class="cross-icon"></div>
                @endif
            </div>
            <div class="logo-text">
                <h1>{{ isset($configuracion) && $configuracion->nombre ? $configuracion->nombre : 'Sistema Médico' }}</h1>
                <p>Gestión Integral de Pacientes</p>
            </div>
        </div>

        <!-- Información del documento -->
        <div class="document-info">
            <h2>Informe de Citas</h2>
            <p>Generado: {{ Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
            <div class="status-text">Reporte Actualizado</div>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<div class="content">
    <!-- Título y descripción -->
    <div class="title-section">
        <h2>Listado de Citas Médicas</h2>
        <p>Total de citas: <span class="highlight-text">{{ count($eventos) }}</span></p>
        <span class="title-accent"></span>
    </div>

    <!-- Estadísticas en fila -->
    <div class="stats-row">
        <div class="stat-column">
            <div class="stat-box stat-blue">
                <span class="stat-label">Total</span>
                <span class="stat-value">{{ count($eventos) }}</span>
            </div>
        </div>
        <div class="stat-column">
            <div class="stat-box stat-purple">
                <span class="stat-label">Pendientes</span>
                <span class="stat-value">{{ $eventos->where('estado', 'pendiente')->count() }}</span>
            </div>
        </div>
        <div class="stat-column">
            <div class="stat-box stat-green">
                <span class="stat-label">Atendidas</span>
                <span class="stat-value">{{ $eventos->where('estado', 'atendida')->count() }}</span>
            </div>
        </div>
        <div class="stat-column">
            <div class="stat-box stat-amber">
                <span class="stat-label">Canceladas</span>
                <span class="stat-value">{{ $eventos->where('estado', 'cancelada')->count() }}</span>
            </div>
        </div>
    </div>

    <!-- Tabla de datos -->
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th style="width: 5%; text-align: center;">#</th>
                <th style="width: 10%;">Fecha</th>
                <th style="width: 10%;">Hora</th>
                <th style="width: 20%;">Doctor</th>
                <th style="width: 20%;">Paciente</th>
                <th style="width: 15%;">Consultorio</th>
                <th style="width: 10%;">Estado</th>
                <th style="width: 10%;">Registro</th>
            </tr>
            </thead>
            <tbody>
            @if(count($eventos) > 0)
                @foreach($eventos as $index => $evento)
                    <tr>
                        <td class="patient-id-cell">
                            <span class="patient-id">{{ $index+1 }}</span>
                        </td>
                        <td>{{ Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($evento->start)->format('h:i A') }}</td>
                        <td>{{ $evento->doctor->nombres ?? 'N/A' }}</td>
                        <td>{{ $evento->user->name ?? 'N/A' }}</td>
                        <td>{{ $evento->consultorio->nombre ?? 'No asignado' }}</td>
                        <td>
                            <span class="info-badge {{ strtolower($evento->estado) }}">{{ $evento->estado }}</span>
                        </td>
                        <td>{{ optional($evento->created_at)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" style="text-align: center;">
                        No se encontraron citas médicas para el período seleccionado
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Área fija inferior -->
<div class="fixed-bottom">
    <!-- Membrete -->
    <div class="membrete">
        <p><strong>{{ isset($configuracion) && $configuracion->nombre ? $configuracion->nombre : 'Centro Médico Especializado Bienestar' }}</strong></p>
        <p>{{ isset($configuracion) && $configuracion->direccion ? $configuracion->direccion : 'Av. Constitución #1240, Colonia Médica, Ciudad Salud' }}</p>
        <p>Teléfono: {{ isset($configuracion) && $configuracion->telefono ? $configuracion->telefono : '(555) 123-4567' }} | Email: {{ isset($configuracion) && $configuracion->correo ? $configuracion->correo : 'contacto@centromedicobienestar.com' }}</p>
        <p>www.centromedicobienestar.com</p>
        <p>&copy; {{ date('Y') }} Sistema Médico - Todos los derechos reservados | Documento confidencial</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Este documento es de carácter confidencial y para uso exclusivo del personal autorizado</p>
        Impreso por: {{ Auth::check() ? Auth::user()->email : 'Usuario del Sistema' }} | Fecha: {{ date('d-m-Y H:i:s') }} | Página 1 de 1
    </div>
</div>
</body>
</html>
