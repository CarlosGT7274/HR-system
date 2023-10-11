@extends('layouts.simple')

@section('content')
    <div class="mx-auto flex flex-col gap-4 my-5 p-3 rounded w-96 h-96">
        <form class="d-flex flex-column gap-4" style="width: 20rem;" method="post" action="{{ route('login.submit') }}">
            @csrf
            <h2 class="text-3xl">Cambiar Contraseña</h2>
            <div>
                <label for="email" class="text-lg mb-2">Correo Electrónico</label>
                <input autocomplete="email" class="form-control" name="correo" type="email"
                    placeholder="Ingrese un correo">
                @if ($errors->has('correo'))
                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                @endif
            </div>

            @if ($message)
                <span class="text-danger">{{ $message }}</span>
            @endif
            <button class="border-2 border-sky-800 rounded-lg p-2 mx-auto" type="submit">Enviar Correo</button>
        </form>
        <a class="text-decoration-none text-sky-700" href={{ route('login.form') }}>
            Regresar
        </a>
    </div>
@endsection
