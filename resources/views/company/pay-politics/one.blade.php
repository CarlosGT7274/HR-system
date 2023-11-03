@extends('layouts.one')

@section('title')
    <h1 class="text-2xl font-semibold flex-1">{{ $data['nombre'] }}</h1>
@endsection

@section('inputs')
    <section class="w-5/6 md:w-2/3 xl:w-5/6 grid lg:grid-cols-2 gap-x-8 gap-y-8 mx-auto">
        <div class="flex flex-row items-center gap-2 p-2">
            <label for="nombre">Nombre: </label>
            <input class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" readonly id="nombre" type="text"
                name="nombre" placeholder="Nombre de la Política" value="{{ $data['nombre'] }}" />
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label for="cod">Activo: </label>
            <input class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" readonly id="cod"
                type="number" min="0" max="1" name="activo" placeholder="Está Activo?"
                value="{{ $data['activo'] }}" />
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label for="sig">Paga Días Feriados: </label>
            <input class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" readonly id="sig"
                type="number" min="0" max="1" name="paga_días_feriados"
                placeholder="Indica si se pagan Feriados" value="{{ $data['pagaFeriados'] }}" />
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label for="sig">Paga horas Extras: </label>
            <input class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" readonly id="sig"
                type="number" min="0" max="1" name="paga_horas_extras"
                placeholder="Indica si se pagan Feriados" value="{{ $data['pagaExtras'] }}" />
        </div>
    </section>
@endsection

@section('extra-info')
    {{-- <section class="mt-8">
        <header>
            @if ($failed)
                <span class="text-danger"> No se pudo eliminar debido a que tiene empleados asignados</span>
            @endif
            <h2 class="text-xl font-semibold">Politicas de Pago Relacionadas</h2>
        </header>
        <div class="mt-3 grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-10">
            @foreach ($data['politics'] as $item)
                <a class="border-b-2 border-ldark w-full text-center select-none h-12 flex items-center justify-center cursor-pointer"
                    href="">
                    {{ $item['nombre'] }}
                </a>
            @endforeach
            {{-- <a class="border-b-2 border-ldark hover:border-success w-full text-center font-semibold cursor-pointer select-none h-16 hover:text-success flex items-center justify-center"
                href="{{ route('company.pay-politics.form', ['id_pay_code' => 2]) }}">
                <i class="fa-solid fa-plus fa-xl"></i>
            </a>
        </div>
    </section> --}}
@endsection
