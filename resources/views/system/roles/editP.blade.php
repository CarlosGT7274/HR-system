@extends('layouts.base')

@section('content')
    <div class="flex flex-col w-screen min-h-screen p-4 bg-gray-100">
        <h1 class="text-3xl font-bold mb-4">Editar Permisos del Rol</h1>
        <form action="{{route('updatedprofilef.post')}}" method="POST" >
            @method('PUT')
            @csrf
            <header class="flex flex-row">
                <h2>Atributos</h2>
                <div class="flex flex-row">
                    <button type="button" id="edtinput" class=" ps-5">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button type="submit" id="saveIcon" class=" ps-5 hidden">
                        <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                    <button type="button" id="limpiarBtn" class=" px-4 ms-4 rounded hidden">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </header>
            
            <section>
                <div class="flex flex-row space-y-2 justify-center items-center">
                    <label for="Nrol" class="font-semibold w-40">Nombre del Rol:</label>
                    <input id="Nrol" name="Nrol" type="text" value="{{ $data['nombre'] }}"
                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                    <input type="hidden" name="idrol" value="{{$data['id_rol']}}">
                </div>

                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 ">Nombre</th>
                            <th class="px-4 py-2 ">#</th>
                            <th class="px-4 py-2 ">Conceder</th>
                            <th class="px-4 py-2 ">Denegar</th>
                            <th class="px-4 py-2 ">Lectura</th>
                            <th class="px-4 py-2 ">Creacion</th>
                            <th class="px-4 py-2 ">Actualizar</th>
                            <th class="px-4 py-2 ">Eliminacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($data['permisos']); $i++)
                            <tr>
                                <td class="border px-4 py-2">{{ $permisosG[$i]['nombre'] }}</td>
                                <td class="border px-4 py-2">
                                    <input type="hidden" name="permisos[{{ $i }}][id_permiso]" value="{{ $permisosG[$i]['id_permiso'] }}">

                                    <input type="checkbox" @if ($data['permisos'][$i]['valor'] == 15) checked @endif value="15"
                                        name="permisos[{{$i}}][todos]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" @if ($data['permisos'][$i]['valor'] >= 0) checked @endif value="0"
                                        name="permisos[{{$i}}][on]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" @if ($data['permisos'][$i]['valor'] == -1) checked @endif value="-1"
                                        name="permisos[{{$i}}][off]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" @if ($data['permisos'][$i]['valor'] % 2 == 1) checked @endif value="1"
                                        name="permisos[{{$i}}][r]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" @if (
                                        $data['permisos'][$i]['valor'] >= 2 &&
                                            $data['permisos'][$i]['valor'] - 4 > 0 &&
                                            $data['permisos'][$i]['valor'] - 8 > 0) checked @endif value="2"
                                        name="permisos[{{$i}}][c]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" @if (
                                        $data['permisos'][$i]['valor'] >= 4 &&
                                            ($data['permisos'][$i]['valor'] - 8 >= 4 || $data['permisos'][$i]['valor'] < 8)) checked @endif value="4"
                                        name="permisos[{{$i}}][u]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" @if ($data['permisos'][$i]['valor'] >= 8) checked @endif value="8"
                                        name="permisos[{{$i}}][d]"
                                        class="w-full border rounded-lg p-2 cursor-not-allowed pointer-events-none">
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </section>
        </form>



    </div>
@endsection

@section('js-scripts')
    <script>
        const input = document.getElementById("Nrol")

        const editactiavate = document.getElementById("edtinput")

        const limpiarBtn = document.getElementById('limpiarBtn');

        const save = document.getElementById('saveIcon');

        editactiavate.addEventListener("click", () => {
            const permisosC = document.querySelectorAll('input[type="checkbox"]');

            input.classList.remove('cursor-not-allowed', 'pointer-events-none');
            editactiavate.classList.add('hidden');
            save.classList.remove('hidden');
            limpiarBtn.classList.remove('hidden');
            permisosC.forEach(checkbox => {
                checkbox.classList.remove('cursor-not-allowed', 'pointer-events-none');
            });
        })

        limpiarBtn.addEventListener('click', () => {
            const permisosC = document.querySelectorAll('input[type="checkbox"]');

            input.classList.add('cursor-not-allowed', 'pointer-events-none');
            editactiavate.classList.remove('hidden');
            save.classList.add('hidden');
            limpiarBtn.classList.add('hidden');
            permisosC.forEach(checkbox => {
                checkbox.classList.add('cursor-not-allowed', 'pointer-events-none');
            });

            input.value = input.defaultValue;
            permisosC.forEach(checkbox => {
                checkbox.checked = checkbox.defaultValue;
            });
        });
    </script>
@endsection
