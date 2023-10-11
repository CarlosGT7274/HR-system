@extends('layouts.simple')

@section('content')
    <div class="mx-auto flex flex-col gap-4 my-5 p-3 border-2 border-sky-800 rounded w-96">
        <form class="flex flex-col gap-4" method="post" action="{{ route('login.submit') }}">
            @csrf
            <h2 class="text-3xl">Inicio de Sesión</h2>
            <div>
                <label for="email" class="text-lg">Correo Electrónico</label>
                <input autocomplete="email" class="form-control" name="correo" type="email" placeholder="Ingrese un correo">
                @if ($errors->has('correo'))
                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                @endif
            </div>

            <div>
                <label for="password" class="text-lg">Contraseña</label>
                <input class="form-control" name="contraseña" type="password" placeholder="Ingrese su contraseña">
                @if ($errors->has('contraseña'))
                    <span class="text-danger">{{ $errors->first('contraseña') }}</span>
                @endif
            </div>

            @if ($message)
                <span class="text-danger">{{ $message }}</span>
            @endif
            <button class="border-2  border-sky-800 rounded-lg p-2" type="submit">Ingresar</button>

        </form>
        <a class="text-decoration-none text-sky-700" href={{ route('resetPassword.form') }}>
            ¿Se te olvido tu contraseña?
        </a>

        <script>
            console.log(@json($message))
        </script>
    </div>
@endsection
