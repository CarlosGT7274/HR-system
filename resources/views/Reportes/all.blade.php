@extends('layouts.base')

@section('content')
    <style>
        td>div {
            display: none;
        }

        td:hover>div {
            display: block;
        }
    </style>
    {{-- @foreach ($data['fechas'] as $item)
    {{json_encode($item)}}
    @endforeach --}}
    <form method="post" action="{{ route('pdf.general') }}" class="w-full">
        @csrf
        <input type="hidden" name="viewName" value="Reportes.asistenciaview">
        <input type="hidden" name="inicio" value="{{ $inicio }}">
        <input type="hidden" name="fin" value="{{ $fin }}">
        <input type="hidden" name="endpointApi" value="reportAttendance">
        <button type="submit">exportar</button>
    </form>

    <form action="">
        <input type="date" value="inicio">
        <input type="date" value="fin">
        <button type="submit">enviar</button>
    </form>
        
    <section class="w-full overflow-x-scroll">
        <table id="miTabla" class="table latabla w-[150%]">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 sticky left-0 bg-dark z-10">ID</th>
                    <th class="px-4 py-2 sticky left-14 bg-dark z-10">Nombre</th>
                    @foreach ($data['fechas'] as $fecha)
                        <th class="px-4 py-2 ">{{ $fecha }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['empleados'] as $empleado)
                    <tr class="border-b">
                        <td class="px-4 py-2 sticky left-0 bg-light z-10">{{ $empleado['id_empleado'] }}</td>
                        <td class="px-4 py-2 sticky left-14 bg-light z-10">
                            {{ $empleado['nombre'] . ' ' . $empleado['apellidoP'] . ' ' . $empleado['apellidoM'] }}</td>
                        @foreach ($data['fechas'] as $fecha)
                            <td class="px-4 py-2 relative text-center">
                                @if (array_key_exists($fecha, $empleado['asistencias']))
                                    {{ $empleado['asistencias'][$fecha]['tipo_in'] }}
                                    <div
                                        class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-2 border border-gray-300 rounded-lg shadow-md z-50 w-72 ">
                                        <p>Entrada: {{ $empleado['asistencias'][$fecha]['entrada'] }}</p>
                                        <p>Tipo Entrada: {{ $empleado['asistencias'][$fecha]['tipo_in'] }}</p>
                                        <p>Salida: {{ $empleado['asistencias'][$fecha]['salida'] }}</p>
                                        <p>Tipo Salida: {{ $empleado['asistencias'][$fecha]['tipo_out'] }}</p>
                                    </div>
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
    </section>

    {{-- @include('Reportes.asistenciaview'); --}}
@endsection

@section('js-scripts')
    @vite('resources/js/datatables.js')
    {{-- <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columnDefs: [{
                    targets: '_all',
                    className: "w-96",
                    width: "18rem"
                }]
            });
        });
    </script> --}}
@endsection
