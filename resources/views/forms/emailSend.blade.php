@extends('layouts.simple')

@section('content')
    <div class="w-full bg-ldark pt-28 h-[100vh]">
        <div class="mx-auto flex flex-col p-5 rounded-xl bg-light/80 md:w-96 w-72 shadow-2xl shadow-dark gap-4">
            <h1 class="text-2xl text-dark text-center font-semibold"> ¡Email Enviado Correctamente! </h1>

            <a class="text-decoration-none text-sky-700 flex flex-row items-center gap-1 text-lg"
                href={{ route('login.form') }}>
                <i class="fa-solid fa-md fa-arrow-left pt-1" style="color: var(--color-primary)"></i>
                <p class="font-semibold text-primary text-base">Regresar</p>
            </a>
        </div>
    </div>
@endsection
