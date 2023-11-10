@extends('layouts.base')

@section('content')
    <article class="w-full flex flex-col">
        <header class="h-12 border-b-2 border-primary mb-2 flex flex-row justify-between items-baseline gap-5">
            <a href="{{ route($base_route . '.all') }}">
                <i class="fa-solid fa-arrow-left fa-xl"></i>
            </a>

            <h1 class="flex-1 text-left text-2xl font-semibold">
                {{ $user['nombre'] . ' ' . $user['apellidoP'] . ' ' . $user['apellidoM'] }}
            </h1>

            <form method="POST" action="{{ route($base_route . '.delete', ['id' => $employee['id_' . $id_name]]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="fa-solid fa-lg fa-trash-can hover:text-danger"></i>
                </button>
            </form>
        </header>

        @include('employees.general.one-forms.sys-form')

        @include('employees.general.one-forms.hr-form')

        @include('employees.general.one-forms.att-form')

        <section>

        </section>

    </article>
@endsection


@section('js-scripts')
    @vite('resources/js/inputs.js')
@endsection
