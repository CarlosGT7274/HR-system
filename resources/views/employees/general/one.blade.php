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

        <section class="mt-8 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">
            @foreach ($relatives as $item)
                <a class="border-b-2 border-ldark hover:border-primary w-full text-center font-semibold cursor-pointer select-none h-16 hover:text-primary flex flex-col items-center justify-center"
                    href="{{ route('employees.relatives.one', ['id' => $item['id_familiar'], 'father_id' => $employee['id_empleado']]) }}">
                    <p>
                        {{ $item['nombre'] . ' ' . $item['apellidoP'] . ' ' . $item['apellidoM'] }}
                    </p>
                </a>
            @endforeach
            @if (3 >= 2 && (3 - 4 >= 2 || 3 < 4) && ((3 - 8 != 4 && 3 - 8 != 5) || 3 < 8))
                <a class="border-b-2 border-ldark hover:border-success w-full text-center font-semibold cursor-pointer select-none h-16 hover:text-success flex items-center justify-center"
                    href="{{ route('employees.relatives.form', ['father_id' => $employee['id_empleado']]) }}">
                    <i class="fa-solid fa-plus fa-xl"></i>
                </a>
            @endif
        </section>

        <section class="mt-8 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">
            @foreach ($documents as $item)
                <a class="border-b-2 border-ldark hover:border-primary w-full text-center font-semibold cursor-pointer select-none h-16 hover:text-primary flex flex-col items-center justify-center"
                    href="{{ route('employees.documents.one', ['id' => $item['id_familiar'], 'father_id' => $employee['id_empleado']]) }}">
                    <p>
                        {{ $item['nombre'] }}
                    </p>
                </a>
            @endforeach
            @if (3 >= 2 && (3 - 4 >= 2 || 3 < 4) && ((3 - 8 != 4 && 3 - 8 != 5) || 3 < 8))
                <a class="border-b-2 border-ldark hover:border-success w-full text-center font-semibold cursor-pointer select-none h-16 hover:text-success flex items-center justify-center"
                    href="{{ route('employees.documents.form', ['father_id' => $employee['id_empleado']]) }}">
                    <i class="fa-solid fa-plus fa-xl"></i>
                </a>
            @endif
        </section>

    </article>
@endsection


@section('js-scripts')
    @vite('resources/js/inputs.js')
@endsection
