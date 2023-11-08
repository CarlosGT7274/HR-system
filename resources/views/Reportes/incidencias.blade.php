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
    <div class="flex items-center  justify-center mb-5">
        {{-- <form method="post" action="{{ route('pdf.general') }}" class="w-full">
            @csrf
            <div class=" items-center justify-center">
                <input type="hidden" name="viewName" value="Reportes.asistenciaview">
                <input type="hidden" name="inicio" value="{{ $inicio }}">
                <input type="hidden" name="fin" value="{{ $fin }}">
                <input type="hidden" name="endpointApi" value="reportAttendance">
                <button type="submit"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                    </svg>
                    <span>Exportar</span>
                </button>
            </div>
        </form> --}}
    
        <form method="get" action="{{ route('reporteincidencias') }}">
            @csrf
                <div class="flex items-center justify-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <input type="date" name="inicio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="inicio">
                    </div>
                    <span class="mx-4 text-gray-500">a</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <input type="date" name="fin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="fin">
                    </div>
                    <button type="submit"class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 ml-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Enviar</button>
                </div>
                
        </form>
    </div>

    <section class="w-full overflow-x-scroll">
        <table id="miTabla" class="table latabla ">
            <thead>
                <tr class="bg-dark text-white">
                    <th class="px-4 py-2 sticky left-0 bg-dark z-10">ID</th>
                    <th class="px-4 py-2 sticky left-12 bg-dark z-10">Nombre</th>
                    @foreach ($data['fechas'] as $fecha)
                        <th class="px-4 py-2 ">{{ $fecha }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['empleados'] as $empleado)
                    <tr class="border-b">
                        <td class="px-4 py-2 sticky left-0 bg-light z-10">{{ $empleado['id_empleado'] }}</td>
                        <td class="px-4 py-2 sticky left-12 bg-light z-10">
                            {{ $empleado['nombre'] . ' ' . $empleado['apellidoP'] . ' ' . $empleado['apellidoM'] }}</td>
                        @foreach ($data['fechas'] as $fecha)
                            <td class="px-4 py-2 relative text-center">
                                @if (in_array($fecha, $empleado['asistencias']))
                                    j
                                    {{-- {{ $empleado['asistencias'][$fecha] }} --}}
                                @elseif (array_key_exists($fecha, $empleado['faltas']))
                                    {{-- Falta --}}
                                    {{ $empleado['faltas'][$fecha] }}
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
