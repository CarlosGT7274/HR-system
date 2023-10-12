@extends('layouts.simple')

@section('content')
    <div class="mx-auto flex flex-col p-3 rounded w-96 mt-28">
        <form class="flex flex-col gap-3" method="post" action="{{ route('login.submit') }}">
            @csrf
            <h2 class="text-3xl text-center font-semibold">Inicio de Sesión</h2>
            <div class="flex flex-col gap-4 my-4">
                <div>
                    <div
                        class="mb-1 border-2 p-2 rounded-lg border-slate-300 flex flex-row gap-2 items-center justify-around">
                        <i class="fa-solid fa-lg fa-envelope"></i>
                        <input class="w-full" autocomplete="email" name="correo" type="email"
                            placeholder="Correo electrónico">
                    </div>

                    @if ($errors->has('correo'))
                        <span class="text-red-700">{{ $errors->first('correo') }}</span>
                    @endif
                </div>

                <div>
                    <div
                        class="mb-1 border-2 p-2 rounded-lg border-slate-300 flex flex-row gap-2 items-center justify-around">
                        <i class="fa-solid fa-lg fa-key"></i>
                        <input class="w-full" id="password" name="contraseña" type="password" placeholder="Contraseña">
                        <button type="button" id="preview">
                            <i class="fa-solid fa-lg fa-eye"></i>
                        </button>
                    </div>

                    @if ($errors->has('contraseña'))
                        <span class="text-red-700">{{ $errors->first('contraseña') }}</span>
                    @endif
                </div>

                @if ($message)
                    <span class="text-red-700">{{ $message }}</span>
                @endif
                <button class="border-2 border-sky-800 rounded-lg p-2 hover:bg-sky-800 hover:text-white font-semibold"
                    type="submit">Ingresar</button>
            </div>
        </form>
        <a class="text-decoration-none text-sky-700 text-lg" href={{ route('resetPassword.form') }}>
            ¿Se te olvido tu contraseña?
        </a>
    </div>
@endsection

@section('js-scripts')
    @vite('resources/js/preview_password.js')
@endsection
