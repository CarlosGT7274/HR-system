@extends('layouts.base')

@section('content')
    <div class="flex flex-col w-screen">
        <div class="flex  gap-8">
            <h1 class=" text-dark font-semibold text-4xl">Perfiles</h1>
        </div>

        <div>
            <div class="">
                <h2 class="text-2xl font-bold mb-4">Administrar Roles y Permisos</h2>
                <div class="grid grid-cols-4 gap-x-12 px-4 gap-y-5">
                    @foreach ($data as $rol)
                        <a class="border-b-2 border-ldark hover:border-primary w-full text-center font-semibold select-none h-12 hover:text-primary flex items-center justify-center"
                            href="{{ route('rol.one', ['id' => $rol['id_rol']]) }}">
                            <p>
                                {{ $rol['nombre'] }}
                            </p>
                        </a>
                    @endforeach
                    {{-- TODO: Cambiar Ruta --}}
                    <a class="border-b-2 border-ldark hover:border-primary w-full text-center font-semibold select-none h-12 hover:text-primary flex items-center justify-center"
                        href="{{ route('rol.form') }}">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>


        </div>



    </div>
@endsection

@section('js-scripts')
@endsection
