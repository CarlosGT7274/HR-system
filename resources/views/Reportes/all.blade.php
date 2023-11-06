@extends('layouts.base')

@section('content')
    {{-- @foreach ($data['fechas'] as $item)
    {{json_encode($item)}}
    @endforeach --}}
    <main class="p-3 w-full">
        <table id="miTabla" class="w-full">
            <thead>
                <tr>
                    <th class="w-[100px]">ID</th>
                    <th class="w-[100px]">Nombre</th>
                    @foreach ($data['fechas'] as $item)
                        <th class="w-[100px]">{{ $item }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['empleados'] as $item)
                    <tr>
                        <td class="w-[100px]">{{ $item['id_empleado'] }}</td>
                        <td class="w-[100px]">sdf@gsd</td>
                        @foreach ($data['fechas'] as $f)
                            <td class="w-[100px]">{{ $f }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection

@section('js-scripts')
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columnDefs: [{
                    targets: '_all',
                    // visible: false
                    width: "250px"
                }]
            });
        });
    </script>
@endsection
