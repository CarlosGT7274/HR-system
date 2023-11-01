@extends('layouts.base')

@section('content')
    <div class="flex flex-col w-screen min-h-screen p-4 bg-gray-100">
        <h1 class="text-3xl font-bold mb-4">Crear un nuevo Rol</h1>
        <form action="{{route('create.rolss')}}" method="POST" >
          @method('POST')
          @csrf
          <header class="flex flex-row">
              <h2>Atributos</h2>
              <div class="flex flex-row">
                  <button type="submit" id="saveIcon" class=" ps-5 ">
                      <i class="fa-solid fa-floppy-disk"></i>
                  </button>
              </div>
          </header>
          
          <section >
              <div class="flex flex-row space-y-2 justify-center items-center">
                  <label for="Nrol" class="font-semibold w-40">Nombre del Rol:</label>
                  <input id="Nrol" name="Nrol" type="text" value=""
                      class="w-full border rounded-lg p-2 ">
                  <input type="hidden" name="idrol" value="">
              </div>

              <table class="min-w-full table">
                  <thead>
                      <tr>
                          <th class="px-4 py-2 ">Nombre</th>
                          <th class="px-4 py-2 ">Todos</th>
                          <th class="px-4 py-2 ">Conceder</th>
                          <th class="px-4 py-2 ">Denegar</th>
                          <th class="px-4 py-2 ">Lectura</th>
                          <th class="px-4 py-2 ">Creacion</th>
                          <th class="px-4 py-2 ">Actualizar</th>
                          <th class="px-4 py-2 ">Eliminacion</th>
                      </tr>
                  </thead>
                  <tbody>
                      @for ($i = 1; $i < count($permisosG); $i++)
                      <tr>
                        <td class="border px-4 py-2">{{ $permisosG[$i]['nombre'] }}</td>
                        <td class="border px-4 py-2">
                            <input type="hidden" name="permisos[{{ $i }}][id_permiso]" value="{{ $permisosG[$i]['id_permiso'] }}">

                            <input type="checkbox" name="permisos[{{$i}}][todos]" id="" value="15">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" name="permisos[{{$i}}][on]" id="" value="0">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" name="permisos[{{$i}}][off]" id="" value="-1">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" name="permisos[{{$i}}][r]" id="" value="1">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" name="permisos[{{$i}}][c]" id="" value="2">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" name="permisos[{{$i}}][u]" id="" value="4">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" name="permisos[{{$i}}][d]" id="" value="8">
                        </td>
                        {{-- @endif --}}
                        
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
    const checkboxesEnFila = document.querySelectorAll('input[type="checkbox"]');

checkboxesEnFila.forEach(function(cb) {
    const tipo = cb.name.split('[')[2]
    if (tipo === 'off]') {
        cb.addEventListener('click', function() {

            const checkboxesEnFila = this.parentElement.parentElement.querySelectorAll(
                'input[type="checkbox"]');

            if (this.checked) {
                checkboxesEnFila.forEach(function(cb) {
                    const name = cb.name.split('[')[2]
                    cb.checked = name === "off]" ? true :
                        false;
                });
            }

        });
    } else if (tipo === 'todos]') {
        cb.addEventListener('change', function() {

            const checkboxesEnFila = this.parentElement.parentElement.querySelectorAll(
                'input[type="checkbox"]');

            if (this.checked) {
                checkboxesEnFila.forEach(function(cb) {
                    const name = cb.name.split('[')[2]
                    cb.checked = name !== "off]" ? true :
                        false;
                });
            }
        });
    } else if (tipo === 'on]') {
        cb.addEventListener('change', function() {

            const checkboxesEnFila = this.parentElement.parentElement.querySelectorAll(
                'input[type="checkbox"]');

            if (!this.checked) {
                checkboxesEnFila.forEach(function(cb) {
                    const name = cb.name.split('[')[2]
                    if (name === "off]") {
                        cb.checked = true;  
                    } else {
                        cb.checked =  false;
                    }
                });
            }
            else {
                checkboxesEnFila.forEach(function(cb) {
                    const name = cb.name.split('[')[2]
                    if (name === "off]") {
                        cb.checked = false;  
                    }
                });
            }
        });
    } else {
        cb.addEventListener('change', function() {

            const checkboxesEnFila = this.parentElement.parentElement.querySelectorAll(
                'input[type="checkbox"]');

            checkboxesEnFila.forEach(function(cb) {
                const name = cb.name.split('[')[2];
                if (name === "off]") {
                    cb.checked = false;
                } else if (name === "on]") {
                    cb.checked = true;
                } else if (name === "todos]") {
                    cb.checked = false;
                }
            });

            if (this.checked) {
                this.checked = true;
            } 

        });
    }
});
</script>
@endsection
