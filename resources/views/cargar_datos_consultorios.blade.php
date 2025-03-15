<?php
use Carbon\Carbon;
?>

    <!-- Tabla Calendario -->
<div class="overflow-x-auto rounded-lg border border-gray-100/70">
    <table class="w-full min-w-[1000px] md:min-w-full">
        <thead class="bg-gradient-to-br from-pink-500 to-yellow-500 text-white">
        <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold uppercase tracking-wider font-montserrat">Hora</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Lunes</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Martes</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Miércoles</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Jueves</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Viernes</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Sábado</th>
            <th class="px-4 py-3 text-center text-sm font-semibold uppercase tracking-wider font-montserrat">Domingo</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100/50">
        @php
            $horas = [
                '08:00:00 - 09:00:00',
                '09:00:00 - 10:00:00',
                '10:00:00 - 11:00:00',
                '11:00:00 - 12:00:00',
                '12:00:00 - 13:00:00',
                '13:00:00 - 14:00:00',
                '14:00:00 - 15:00:00',
                '15:00:00 - 16:00:00',
                '16:00:00 - 17:00:00',
                '17:00:00 - 18:00:00'
            ];
            $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
        @endphp

        @foreach($horas as $index => $hora)
            @php
                list($hora_inicio, $hora_fin) = explode(' - ', $hora);
                // Convertir las horas a objetos Carbon para manipulación
                $horaInicioCarbon = Carbon::createFromFormat('H:i:s', $hora_inicio);
                $horaFinCarbon = Carbon::createFromFormat('H:i:s', $hora_fin);
            @endphp
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-blue-50/30 transition-colors duration-200">
                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                    {{ $horaInicioCarbon->format('h:i A') }} - {{ $horaFinCarbon->format('h:i A') }}
                </td>
                @foreach($diasSemana as $dia)
                    @php
                        $nombre_doctor = '';
                        foreach ($horarios as $horario) {
                            // Convertir las horas del horario a objetos Carbon
                            $horarioInicio = Carbon::createFromFormat('H:i:s', $horario->hora_inicio);
                            $horarioFin = Carbon::createFromFormat('H:i:s', $horario->hora_fin);

                            if (strtoupper($horario->dia) == $dia &&
                                $horaInicioCarbon->between($horarioInicio, $horarioFin) &&
                                $horaFinCarbon->between($horarioInicio, $horarioFin)) {
                                $nombre_doctor = $horario->doctor->nombres . " " . $horario->doctor->apellidos;
                                break;
                            }
                        }
                    @endphp
                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 text-center">{{ $nombre_doctor }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
