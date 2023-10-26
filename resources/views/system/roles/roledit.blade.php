@extends('layouts.base')

@section('content')
<div class="flex flex-col w-screen min-h-screen p-4 bg-gray-100">
    <div class="flex flex-col space-y-2">
        <label for="Nrol" class="font-semibold">Nombre del Nuevo Rol:</label>
        <input id="Nrol" name="Nrol" type="text" value="" class="w-full border rounded-lg p-2">
    </div>
    <div>
        <span class="font-semibold">Asignar Permisos al Rol:</span>
        <table class="min-w-full table-auto">
            <thead>
              <tr>
                <th class="px-4 py-2 ">Nombre</th>
                <th class="px-4 py-2 ">#</th>
                <th class="px-4 py-2 ">Conceder</th>
                <th class="px-4 py-2 ">Denegar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($permisosG as $item)
                <tr>
                  <td class="border px-4 py-2">{{ $item['nombre'] }}</td>
                  <td class="border px-4 py-2">
                    <input type="checkbox" name="" id="">
                  </td>
                  <td class="border px-4 py-2">
                    <input type="checkbox" name="" id="">
                  </td>
                  <td class="border px-4 py-2">
                    <input type="checkbox" name="" id="">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>


@endsection

@section('js-scripts')

@endsection
