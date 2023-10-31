@extends('layouts.form')

@section('inputs')
    <section class="grid xl:grid-cols-4 w-5/6 md:w-2/3 lg:w-5/6 xl:gap-x-20 gap-y-12">
        <div class="xl:col-start-1 xl:col-end-3">
            <label for="name">Nombre</label>
            <x-input id="name" icon="" autocomplete="" type="text" name="nombre"
                placeholder="Nombre de la capacitación" defaultValue="" />
        </div>

        <div class="xl:col-start-3 xl:col-end-5">
            <label for="descripción">Descripción</label>
            <x-input id="descripción" icon="" autocomplete="" type="text" name="descripción"
                placeholder="Descripción de la capacitación" defaultValue="" />
        </div>

        <div class="xl:col-start-2 xl:col-end-4">
            <label for="poblacion">Población</label>
            <x-input id="poblacion" icon="" autocomplete="" type="text" name="población"
                placeholder="Población de la unidad" defaultValue="" />
        </div>

        @if (!empty($empleados))
            <div class="xl:col-start-2 xl:col-end-4">
                <label for="empleados">Empleados: </label>
                <select id="empleados">
                    @for ($i = 0; $i < count($empleados); $i++)
                        <option value="{{ $i }}">
                            {{ $empleados[$i]['nombre'] . ' ' . $empleados[$i]['apellidoP'] . ' ' . $empleados[$i]['apellidoM'] }}
                        </option>
                    @endfor
                </select>

                <button type="button" onclick="addUser()">Agregar empleado</button>
            </div>

            <section class="xl:col-start-1 xl:col-end-5 grid lg:grid-cols-2 gap-4" id="empleados_container">
            </section>
        @endif
    </section>

    <script>
        const empleados = @json($empleados);

        function addUser() {
            let select = document.getElementById("empleados")
            let opcionSeleccionada = select.value

            let nuevoRecuadro = document.createElement("div")

            nuevoRecuadro.innerHTML = empleados[opcionSeleccionada]['nombre']

            let inputDate = document.createElement("input")
            inputDate.type = "date"

            nuevoRecuadro.appendChild(inputDate)

            document.getElementById("empleados_container").appendChild(nuevoRecuadro)
        }
    </script>
@endsection
