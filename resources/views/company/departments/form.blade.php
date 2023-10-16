@extends('layouts.base')

@section('content')
    <h1>Hola</h1>
    <form method="POST" action="{{ route('departments.submit') }}">
        @csrf
        <x-input id="" icon="" needsUnhidden="" autocomplete="" type="text" name="nombre"
            placeholder="Nombre del departamento" />

        <button type="submit"
            class="border-2 text-primary border-primary rounded-lg p-2 hover:bg-primary hover:text-light font-semibold">
            enviar
        </button>
    </form>
@endsection
