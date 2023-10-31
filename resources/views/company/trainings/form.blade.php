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
            <section class="xl:col-start-1 xl:col-end-5 grid lg:grid-cols-2 gap-4">
                @foreach ($empleados as $empleado)
                    <section class="">
                        <p class="text-center">
                            {{ $empleado['nombre'] . ' ' . $empleado['apellidoP'] . ' ' . $empleado['apellidoM'] }}
                        </p>
                        <x-input type="date" icon="" name="nada" />
                    </section>
                @endforeach
            </section>
        @endif
    </section>
@endsection
