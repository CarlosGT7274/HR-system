<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    h3 {
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 0;
        margin-bottom: 0;
    }

    table {
        border-spacing: 1;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
        margin: 0 auto;
        position: relative;
    }

    table td,
    table th {
        padding-left: 8px
    }

    table thead tr {
        height: 60px;
        background: #36304a;
        color: white;
    }

    table tbody tr {
        height: 50px
    }

    table tbody tr:last-child {
        border: 0
    }

    table td,
    table th {
        text-align: left
    }

    table td.l,
    table th.l {
        text-align: right
    }

    table td.c,
    table th.c {
        text-align: center
    }

    table td.r,
    table th.r {
        text-align: center
    }


    tbody tr:nth-child(even) {
        background-color: #f5f5f5
    }

    tbody tr {
        font-family: OpenSans-Regular;
        font-size: 15px;
        color: gray;
        line-height: 1.2;
        font-weight: unset
    }

    tbody tr:hover {
        color: #555;
        background-color: #f5f5f5;
        cursor: pointer
    }
</style>

@php
    $fechas = $data['fechas'];
    $bloques = array_chunk($fechas, 8);
@endphp

<h3>Reporte de Asistencias</h3>

@foreach ($bloques as $bloque)
    <table id="miTabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                @foreach ($bloque as $fecha)
                    <th>{{ $fecha }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data['empleados'] as $empleado)
                <tr>
                    <td>{{ $empleado['id_empleado'] }}</td>
                    <td>{{ $empleado['nombre'] . ' ' . $empleado['apellidoP'] . ' ' . $empleado['apellidoM'] }}</td>
                    @foreach ($bloque as $fecha)
                        <td>
                            @if (array_key_exists($fecha, $empleado['asistencias']))
                                <p>Entrada: {{ $empleado['asistencias'][$fecha]['entrada'] }}</p>
                                <p>Tipo Entrada: {{ $empleado['asistencias'][$fecha]['tipo_in'] }}</p>
                                <p>Salida: {{ $empleado['asistencias'][$fecha]['salida'] }}</p>
                                <p>Tipo Salida: {{ $empleado['asistencias'][$fecha]['tipo_out'] }}</p>
                            @elseif (in_array($fecha, $empleado['faltas']))
                                Falta
                            @else
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach
