@extends('layouts.form')

@section('inputs')
    <section class="w-full grid grid-cols-9 gap-20">
        <div class="xl:col-start-1 xl:col-end-4">
            <label for="name">Nombre</label>
            <x-input id="name" icon="" needsUnhidden="" autocomplete="" type="text" name="nombre"
                placeholder="Nombre del Tipo de Empleado" defaultValue="" />
        </div>

        <div class="xl:col-start-4 xl:col-end-7">
            <label for="name">Tipo</label>
            <x-input id="name" icon="" needsUnhidden="" autocomplete="" type="text" name="nombre"
                placeholder="Nombre del Tipo de Empleado" defaultValue="" />
        </div>

        <div class="xl:col-start-7 xl:col-end-10">
            <label for="name">Población</label>
            <x-input id="name" icon="" needsUnhidden="" autocomplete="" type="text" name="nombre"
                placeholder="Nombre del Tipo de Empleado" defaultValue="" />
        </div>

        <div class="xl:col-start-2 xl:col-end-5">
            <label for="name">Region</label>
            <x-input id="name" icon="" needsUnhidden="" autocomplete="" type="text" name="nombre"
                placeholder="Nombre del Tipo de Empleado" defaultValue="" />
        </div>

        <div class="xl:col-start-6 xl:col-end-8">
            <label for="name">Estado</label>
            @include('components.state-select')
        </div>
    </section>
@endsection
