@extends('layouts.simple')

@section('content')
    <div class="w-full bg-ldark pt-28 h-[100vh]">
        <div class="mx-auto flex flex-col p-5 rounded-xl bg-light/80 md:w-96 w-72 shadow-2xl shadow-dark">
            <form class="flex flex-col gap-3" method="post" action="{{ route('login.submit') }}">
                @csrf
                <h2 class="md:text-3xl text-2xl text-center font-semibold">Inicio de Sesión</h2>
                <div class="flex flex-col gap-4 my-4">
                    <x-input id="" icon="fa-at" name="correo" autocomplete="email" type="email"
                        placeholder="Correo electrónico" needsUnhidden="" />

                    <x-input id="password" icon="fa-key" needsUnhidden="yes" autocomplete="" type="password"
                        name="contraseña" placeholder="Contraseña" />

                    @if ($message)
                        <span class="text-danger">{{ $message }}</span>
                    @endif
                    <button
                        class="border-2 text-primary border-primary rounded-lg p-2 hover:bg-primary hover:text-light font-semibold"
                        type="submit">
                        Ingresar
                    </button>
                </div>
            </form>
            <a class="text-decoration-none font-semibold text-primary text-base" href={{ route('resetPassword.form') }}>
                ¿Se te olvido tu contraseña?
            </a>
        </div>
    </div>
@endsection

@section('js-scripts')
    @vite('resources/js/preview_password.js')
@endsection
