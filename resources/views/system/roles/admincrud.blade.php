@extends('layouts.base')

@section('content')
    <div class="flex flex-col w-screen">
        <div class="flex  gap-8">
            <h1 class=" text-dark font-semibold text-4xl">Perfiles</h1>
            <button class=" bg-secondary hover:bg-primary text-light font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline ms-3s
            
            "> + Nuevo rol </button>
        </div>

        <div>
            <div class="bg-gray-200 p-4">
                <h1 class="text-2xl font-bold mb-4">Administrar Roles y Permisos</h1>
                <div class="overflow-x-auto">
                  <table class="min-w-full table-auto">
                    <thead>
                      <tr>
                        <th class="px-4 py-2 bg-gray-300">ID de Rol</th>
                        <th class="px-4 py-2 bg-gray-300">Nombre</th>
                        <th class="px-4 py-2 bg-gray-300">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Usamos un ciclo para recorrer los elementos del arreglo "data" -->
                      @foreach($data as $rol)
                        <tr>
                          <td class="border px-4 py-2">{{ $rol['id_rol'] }}</td>
                          <td class="border px-4 py-2">{{ $rol['nombre'] }}</td>
                          <td class="border px-4 py-2">
                            <a href="{{ route('rol.edit', ['id' => $rol['id_rol']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><i class="fa-regular fa-pen-to-square"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
        </div>

        

    </div>
@endsection

@section('js-scripts')
   
@endsection
