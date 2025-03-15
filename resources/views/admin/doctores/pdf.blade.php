<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio Médico Profesional</title>
    <style>
        /* Estilos base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.5;
            color: #1f2937;
            background-color: #ffffff;
            font-size: 12pt;
        }

        /* Gradiente del encabezado - simulado con color sólido para PDF */
        .header {
            background-color: #0ea5e9;
            padding: 40px 30px 70px 30px;
            color: white;
            position: relative;
        }

        /* Contenedor principal */
        .container {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            padding: 0;
        }

        /* Logo y título */
        .logo-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-box {
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-right: 15px;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-image img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            object-fit: contain;
        }

        .logo-text h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .logo-text p {
            font-size: 14px;
            opacity: 0.9;
        }

        .document-info {
            text-align: right;
        }

        .document-info h2 {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .document-info p {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Tarjeta principal del contenido */
        .content-card {
            margin: -40px 30px 30px 30px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        /* Sección de título */
        .title-section {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .title-section h2 {
            font-size: 22px;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .title-section p {
            color: #64748b;
            font-size: 14px;
        }

        .title-accent {
            display: block;
            width: 80px;
            height: 6px;
            background-color: #0ea5e9;
            border-radius: 3px;
            margin-top: 15px;
        }

        /* Marca de agua */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 80px;
            color: rgba(0, 0, 0, 0.03);
            font-weight: bold;
            z-index: 1;
        }

        /* Tabla */
        .table-container {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #0ea5e9;
            color: white;
        }

        th {
            padding: 12px 15px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .doctor-name {
            font-weight: 600;
            color: #0c4a6e;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .doctor-title {
            color: #64748b;
            font-size: 11px;
        }

        .contact-primary {
            font-size: 12px;
            margin-bottom: 2px;
        }

        .contact-secondary {
            font-size: 11px;
            color: #64748b;
        }

        /* Badges para especialidades */
        .specialties {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .specialty-badge {
            display: inline-block;
            background-color: #e0f2fe;
            color: #0369a1;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 20px;
        }

        /* Estado vacío */
        .empty-state {
            padding: 60px 0;
            text-align: center;
        }

        .empty-icon {
            font-size: 36px;
            margin-bottom: 15px;
            color: #cbd5e1;
        }

        .empty-message {
            font-size: 16px;
            color: #64748b;
        }

        /* Pie de página */
        .footer {
            display: flex;
            justify-content: space-between;
            padding: 20px 30px;
            color: #64748b;
            font-size: 11px;
            border-top: 1px solid #e5e7eb;
            margin: 0 30px;
        }

    </style>
</head>
<body>
<div class="container">
    <!-- Header con fondo azul -->
    <div class="header">
        <div class="logo-section">
            <!-- Logo y nombre -->
            <div class="logo-container">
                <div class="logo-box">
                    <div class="logo-image">
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
                </div>
                <div class="logo-text">
                    <h1>Huellitas del Corazon</h1>
                    <p>Sistema de Gestión Médica Avanzado</p>
                </div>
            </div>

            <!-- Información del documento -->
            <div class="document-info">
                <h2>Directorio Médico</h2>
                <p>Generado: {{ date('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="content-card">
        <!-- Título y descripción -->
        <div class="title-section">
            <h2>Directorio de Profesionales Médicos</h2>
            <p>Personal médico activo: <span style="font-weight: 600; color: #0ea5e9;">{{ count($doctores) }}</span> profesionales</p>
            <span class="title-accent"></span>
        </div>

        <!-- Marca de agua -->
        <div class="watermark">CONFIDENCIAL</div>

        <!-- Tabla de datos -->
        @if(count($doctores) > 0)
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 25%">Profesional</th>
                        <th style="width: 15%">Cédula</th>
                        <th style="width: 15%">Contacto</th>
                        <th style="width: 15%">Licencia</th>
                        <th style="width: 30%">Especialidades</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctores as $doctor)
                        <tr>
                            <td>
                                <div class="doctor-name">{{ $doctor->nombres }} {{ $doctor->apellidos }}</div>
                                <div class="doctor-title">Dr(a). {{ explode(' ', $doctor->nombres)[0] }} {{ explode(' ', $doctor->apellidos)[0] }}</div>
                            </td>
                            <td>{{ $doctor->cedula }}</td>
                            <td>
                                <div class="contact-primary">{{ $doctor->telefono }}</div>
                                @if(isset($doctor->user->email))
                                    <div class="contact-secondary">{{ $doctor->user->email }}</div>
                                @endif
                            </td>
                            <td>{{ $doctor->licencia_medica }}</td>
                            <td>
                                <div class="specialties">
                                    @foreach($doctor->specialties as $specialty)
                                        <span class="specialty-badge">{{ $specialty->nombre }}</span>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">⚕️</div>
                <div class="empty-message">No hay doctores que coincidan con los criterios de búsqueda</div>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <div>
            &copy; {{ date('Y') }} Huellitas del Corazon - Todos los derechos reservados | Documento confidencial
        </div>
        <div>
            Impreso por: {{ Auth::user()->email }} | Fecha: {{ date('d-m-Y H:i:s') }} | Página 1 de 1
        </div>
    </div>
</div>
</body>
</html>
