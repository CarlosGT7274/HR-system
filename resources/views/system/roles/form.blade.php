{{-- @extends('layouts.base') --}}

{{-- @section('content')
    <div class="flex flex-col w-screen min-h-screen p-4">
        <h1 class="text-3xl font-bold mb-4">Crear un nuevo Rol</h1>
        <form action="{{ route('rol.create') }}" method="POST">
            @method('POST')
            @csrf
            <header class="flex flex-row">
                <h2>Atributos</h2>
                <div class="flex flex-row">
                    <button type="submit" id="saveIcon" class=" ps-5 ">
                        <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                </div>
            </header>

            <section>
                <div class="flex flex-row space-y-2 justify-center items-center">
                    <label for="Nrol" class="font-semibold w-40">Nombre del Rol:</label>
                    <input id="Nrol" name="Nrol" type="text" value=""
                        class="w-full border rounded-lg p-2 ">
                    <input type="hidden" name="idrol" value="">
                </div>

                <table class="min-w-full table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 ">Nombre</th>
                            <th class="px-4 py-2 ">Todos</th>
                            <th class="px-4 py-2 ">Conceder</th>
                            <th class="px-4 py-2 ">Denegar</th>
                            <th class="px-4 py-2 ">Lectura</th>
                            <th class="px-4 py-2 ">Creacion</th>
                            <th class="px-4 py-2 ">Actualizar</th>
                            <th class="px-4 py-2 ">Eliminacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < count($permisosG); $i++)
                            <tr>
                                <td class="border px-4 py-2">{{ $permisosG[$i]['nombre'] }}</td>
                                <td class="border px-4 py-2">
                                    <input type="hidden" name="permisos[{{ $i }}][id_permiso]"
                                        value="{{ $permisosG[$i]['id_permiso'] }}">

                                    <input type="checkbox" name="permisos[{{ $i }}][todos]"
                                        value="15">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="permisos[{{ $i }}][on]"
                                        value="0">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="permisos[{{ $i }}][off]"
                                        value="-1">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="permisos[{{ $i }}][r]"
                                        value="1">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="permisos[{{ $i }}][c]"
                                        value="2">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="permisos[{{ $i }}][u]"
                                        value="4">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" name="permisos[{{ $i }}][d]"
                                        value="8">
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </section>
        </form>

    </div>
@endsection --}}


@extends('layouts.base')

@section('content')
    <article class="w-full flex flex-col">

        <header class="h-12 border-b-2 border-primary mb-2 flex flex-row items-baseline gap-5">
            <a href="{{ route('rol.all') }}">
                <i class="fa-solid fa-arrow-left fa-xl"></i>
            </a>
            <h1 class="text-2xl font-semibold">Registro de Rol</h1>
        </header>

        <form action="{{ route('rol.create') }}" method="POST" class="flex flex-col justify-center">
            @csrf

            <div class="flex flex-row space-y-2 justify-center items-center">
                <label for="Nrol" class="font-semibold w-40">Nombre del Rol:</label>
                <input id="Nrol" name="Nrol" type="text" class="w-full border rounded-lg p-2 ">
            </div>

            <section class=" overflow-x-auto mt-5">
                <table class="table rounded-xl w-full">
                    <thead>
                        <tr>
                            <th class="border px-3 py-2 sticky left-0 bg-light">Nombre</th>
                            <th class="border px-3 py-2 ">Todos</th>
                            <th class="border px-3 py-2 ">Conceder</th>
                            <th class="border px-3 py-2 ">Denegar</th>
                            <th class="border px-3 py-2 ">Leer</th>
                            <th class="border px-3 py-2">Crear</th>
                            <th class="border px-3 py-2 ">Actualizar</th>
                            <th class="border px-3 py-2 ">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < count($permisosG); $i++)
                            <tr>
                                <td class="border px-3 py-2 w-96 lg:w-1/3 sticky left-0 bg-light">
                                    {{ $permisosG[$i]['nombre'] }}</td>

                                <input type="hidden" name="permisos[{{ $i }}][id_permiso]"
                                    value="{{ $permisosG[$i]['id_permiso'] }}">
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="15" name="permisos[{{ $i }}][todos]"
                                        class="w-full border rounded-lg p-1">
                                </td>
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="0" name="permisos[{{ $i }}][on]"
                                        class="w-full border rounded-lg p-1">
                                </td>
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="-1" name="permisos[{{ $i }}][off]" checked
                                        class="w-full border rounded-lg p-1">
                                </td>
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="1" name="permisos[{{ $i }}][r]"
                                        class="w-full border rounded-lg p-1">
                                </td>
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="2" name="permisos[{{ $i }}][c]"
                                        class="w-full border rounded-lg p-1">
                                </td>
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="4" name="permisos[{{ $i }}][u]"
                                        class="w-full border rounded-lg p-1">
                                </td>
                                <td class="border w-32 px-3 py-2">
                                    <input type="checkbox" value="8" name="permisos[{{ $i }}][d]"
                                        class="w-full border rounded-lg p-1">
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </section>

            <button type="submit"
                class="border-2 text-primary border-primary rounded-lg p-2 hover:bg-primary hover:text-light font-semibold mt-8 w-32 mx-auto">
                Guardar
            </button>
        </form>
    </article>
@endsection

@section('js-scripts')
    @vite('resources/js/rols.js')
@endsection
