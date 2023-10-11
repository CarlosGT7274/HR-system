@extends('layouts.simple')

@section('content')
    <div style="width: 23rem;" class="mx-auto d-flex flex-column gap-4 my-5 p-3 border border-2 rounded rounded-lg">
        <form class="d-flex flex-column gap-4" style="width: 20rem;" method="post" action="{{ route('login.submit') }}">
            @csrf
            <h2>Reset Password</h2>
            <div>
                <label for="email" class="form-label">Correo Electrónico</label>
                <input autocomplete="email" class="form-control" name="correo" type="email"
                    placeholder="Ingrese un correo">
                @if ($errors->has('correo'))
                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                @endif
            </div>

            @if ($message)
                <span class="text-danger">{{ $message }}</span>
            @endif
            <button class="btn btn-primary" type="submit">Enviar Correo</button>
        </form>

        <a class="text-decoration-none" href={{ route('login.form') }}>
            Regresar
        </a>
    </div>
@endsection
