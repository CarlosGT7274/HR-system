@extends('layouts.one')

@section('title')
    <h1 class="text-2xl font-semibold flex-1">{{ $data['fecha_excep'] }}</h1>
@endsection


@section('inputs')
    {{-- @if ($errors->has('observacion'))
        {{dd($errors)}}
    @endif --}}

    <section class="w-5/6 md:w-2/3 xl:w-5/6 grid xl:grid-cols-2 gap-x-8 gap-y-8 mx-auto">
            <input type="hidden" name="id" readonly
                value="{{ $data['id'] }}" >
        
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Fecha de exepcion: </label>
            <input type="datetime-local" step="1" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="fecha_excep" readonly
                value="{{ $data['fecha_excep'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Fecha inicio: </label>
            <input type="datetime-local" step="1" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="tiempoini" readonly
                value="{{ $data['tiempoini'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Fecha termino: </label>
            <input type="datetime-local" step="1" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="tiempofin" readonly
                value="{{ $data['tiempofin'] }}" id="name" >
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Observaciones: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="observacion" readonly
                value="{{ $data['observacion'] }}" id="name" >
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Codigo de pago: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" 
            name="id_codpag" readonly
                value="{{ $data['id_codpago'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Codigo del trabajador: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1"
             name="id_trabajador" readonly
                value="{{ $data['id_trabajador'] }}" id="name">
        </div>
    </section>
@endsection


