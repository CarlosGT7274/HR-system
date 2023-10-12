@extends('layouts.simple')

@section('content')
    <div class="w-full bg-gray-200 pt-28" style="height: 100vh">
        <div class="mx-auto flex flex-col p-5 rounded-xl
        bg-white md:w-96 w-72">
            <form class="flex flex-col gap-4" method="post" action="{{ route('login.submit') }}">
                @csrf
                <h2 class="md:text-3xl text-2xl text-center font-semibold">Cambiar Contraseña</h2>
                <div class="flex flex-col gap-4 my-4">

                    <x-input icon="fa-envelope" name="correo" autocomplete="email" type="email"
                        placeholder="Correo electrónico" needsUnhidden=""></x-input>

                    @if ($message)
                        <span class="text-red-700">{{ $message }}</span>
                    @endif
                    <button class="border-2 border-sky-800 rounded-lg p-2 hover:bg-sky-800 hover:text-white font-semibold"
                        type="submit">Enviar Correo</button>
                </div>
            </form>
            <a class="text-decoration-none text-sky-700 flex flex-row items-center gap-1 text-lg"
                href={{ route('login.form') }}>
                <i class="fa-solid fa-lg fa-arrow-left pt-1"></i>
                <p>Regresar</p>
            </a>
        </div>
    </div>
@endsection
