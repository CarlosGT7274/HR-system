@extends('layouts.base')

@section('content')
    <div id="content" class="w-full">
        <form method="POST" action="{{ route('attendance.graph') }}" class="w-full">
            @csrf
            <div class="flex flex-col items-center">
                <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 p-2 ">
                    <div class="w-full">
                        <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Selecciona una fecha:</label>
                        <input type="date" name="fecha" id="fecha" value={{ $filtros['value'] }}
                            class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="w-full">
                        <label for="Sunidad" class="block text-gray-700 text-sm font-bold mb-2">Unidad:</label>
                        <select name="unidad" id="Sunidad"
                            class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Todos</option>
                            @foreach ($unidades as $item)
                                @if ($item['id_unidad'] == $filtros['unidad'])
                                    <option selected value="{{ $item['id_unidad'] }}">{{ $item['nombre'] }}</option>
                                @else
                                    <option value="{{ $item['id_unidad'] }}">{{ $item['nombre'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="Sregion" class="block text-gray-700 text-sm font-bold mb-2">Departamento:</label>
                        <select name="departamento" id="Sregion"
                            class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Todos</option>
                            @foreach ($departamentos as $item)
                                @if ($item['id_departamento'] == $filtros['departamentoss'])
                                    <option selected value="{{ $item['id_departamento'] }}">{{ $item['nombre'] }}</option>
                                @else
                                    <option value="{{ $item['id_departamento'] }}">{{ $item['nombre'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="Spositions" class="block text-gray-700 text-sm font-bold mb-2">Puesto:</label>
                        <select name="posiciones" id="Spositions"
                            class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Todos</option>
                            @foreach ($posiciones as $item)
                                @if ($item['id_puesto'] == $filtros['puesto'])
                                    <option selected value="{{ $item['id_puesto'] }}">{{ $item['nombre'] }}</option>
                                @else
                                    <option value="{{ $item['id_puesto'] }}">{{ $item['nombre'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="Sregion" class="block text-gray-700 text-sm font-bold mb-2">Region:</label>
                        <select name="region" id="Sregion"
                            class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Todas</option>
                            @foreach ($unidades as $item)
                                @if ($item['region'] == $filtros['region'])
                                    <option selected value="{{ $item['region'] }}">{{ $item['region'] }}</option>
                                @else
                                    <option value="{{ $item['region'] }}">{{ $item['region'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    @if ($errors->has('fecha'))
                        <p class="w-full text-red-500 text-xs mt-2">{{ $errors->first('fecha') }}</p>
                    @endif
                </div>

                <button type="submit" class="bg-secondary hover:bg-primary text-light font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline ms-3s">Enviar</button>

            </div>


        </form>

        <div class="flex items-center justify-center mt-2">
            <a href="/dashboard" class="px-2 py-3 bg-danger rounded-lg text-light">Limpiar Filtros</a>
        </div>

        <div id="graphics" class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full px-4 md:px-8 ">

            <div class="flex flex-col  col-start-1 col-end-4 md:col-start-1">
                @if (session('permissions')[1]['sub_permissions'][102]['valor'] >= 0)    
                <div class="md:col-start-1 md:col-end-4 flex flex-col shadow-lg rounded-[15px] ">
                    <header class="px-5 py-2 mt-2 mb-4 border-b border-dark ">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">General</h2>
                    </header>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-12 xl:flex-row bg-white">
                        <div
                            class="flex xl:flex-col justify-evenly xl:justify-around content-center px-3 py-2 xl:py-0 w-full md:col-start-1 md:col-end-3 xl:col-span-2">
                            <div class="flex flex-col items-center">
                                <h3><i class="fa-solid fa-xl fa-people-group"></i></h3>
                                <span class="font-semibold">{{ $general['data']['total'] }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <h3><i class="fa-solid fa-xl fa-person text-secondary"></i></h3>
                                <span class="font-semibold">{{ $general['data']['hombres']['total'] }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <h3><i class="fa-solid fa-xl fa-person-dress text-fuchsia-400"></i></h3>
                                <span class="font-semibold">{{ $general['data']['mujeres']['total'] }}</span>
                            </div>
                        </div>
    
                        <div class="w-full p-3 xl:p-0 xl:col-span-3">
                            <h2>Edades</h2>
                            <div id="general" class="w-full p-3 xl:p-0 xl:col-span-3">
                                <input type="hidden" name="" id="jsonG" value="{{ json_encode($general) }}">
                            </div>
                        </div>
    
                        <div class="w-full p-3 xl:p-0 xl:col-span-3">
                            <h2>Trabajadores con hijos</h2>
                            <div id="childs" class="w-full p-3 xl:p-0 xl:col-span-3">
                            </div>
                        </div>
    
                        <div class="w-full p-3 xl:p-0 xl:col-span-4">
                            <h2>capacitaciones</h2>    
                            <div id="capacitaciones" class="w-full p-3 xl:p-0 xl:col-span-3">
                                <input type="hidden" name="" id="jsonCa" value="{{ json_encode($general) }}">
                            </div>
                        </div>
    
                    </div>
                </div>
                @endif

                @if (session('permissions')[1]['sub_permissions'][103]['valor'] >= 0)
                <div class="w-full p-3 md:col-start-1 md:col-end-4 bg-white dark:bg-slate-800 shadow-lg rounded-[15px]">
                    <header class="px-5 py-2 mt-2 mb-4 border-b border-dark ">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Cumpleaños del Mes</h2>
                    </header>
                    <ul class="overflow-y-auto h-36 flex flex-row flex-wrap gap-x-3 gap-y-2">
                        @foreach ($birthdays as $employee)
                            @if (is_array($employee))
                                @foreach ($employee as $key => $employeeData)
                                    <li class="p-4 shadow-md shadow-ldark rounded-md h-16">
                                        <div class="text-sm font-semibold">{{ $employeeData['nombre'] }}
                                            {{ $employeeData['apellidoP'] }} {{ $employeeData['apellidoM'] }}</div>
                                        <div class="text-dlight text-xs">{{ $employeeData['cumpleaños'] }}</div>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
                
            
            <div class="md:col-start-1 md:col-end-4">
                @if (session('permissions')[1]['sub_permissions'][101]['valor'] >= 0 )
                <div class="bg-white dark:bg-slate-800 shadow-lg rounded-[15px]   h-11/12">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Asistencias</h2>
                    </header>
                    <div id="attendance" class="grow">
                        <input type="hidden" name="" id="jsonatt" value="{{ json_encode($attendance) }}">
                    </div>
                </div>
                @endif
            
                @if (session('permissions')[1]['sub_permissions'][105]['valor'] >= 0 )
                <div class="w-full bg-white dark:bg-slate-800 shadow-lg rounded-[15px] mt-4 md:mt-0 h-11/12">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Salarios</h2>
                    </header>
                    <div id="salaries" class="grow">
                        <input type="hidden" name="" id="jsonS" value="{{ json_encode($salaries) }}">
                    </div>
                </div>
                @endif

            </div>

            @if (session('permissions')[1]['sub_permissions'][104]['valor'] >= 0)    
            <div class="flex flex-col bg-white shadow-lg rounded-[15px] col-start-1 col-end-4 md:col-start-1">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Bajas</h2>
                </header>
                @if ($rotations['data']['total'] == 0)
                    <h3 class="py-12 mx-auto">Sin Bajas</h3>
                @else
                    <div class=" bg-white grid grid-col-3 ">
                        <input type="hidden" name="" id="jsonR" value="{{ json_encode($rotations) }}">


                        <div class="flex xl:flex-row justify-evenly xl:justify-around content-center px-3 py-2 xl:py-0 w-full ">
                            <div class="flex flex-col items-center">
                                <h3><i class="fa-solid fa-xl fa-people-group"></i></h3>
                                <span class="font-semibold">{{ $rotations['data']['total'] }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <h3><i class="fa-solid fa-xl fa-person text-secondary"></i></h3>
                                <span class="font-semibold">{{ $rotations['data']['hombres'] }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <h3><i class="fa-solid fa-xl fa-person-dress text-fuchsia-400"></i></h3>
                                <span class="font-semibold">{{ $rotations['data']['mujeres'] }}</span>
                            </div>
                        </div>


                        <div class="grid grid-cols-1 lg:grid-cols-3">
                            <div>
                                <h2>Despidos por puesto</h2>
                                <div id="rotations" class="grow"> </div>
                            </div>
                            <div class="grow">
                                <h2>Despidos por Motivo</h2>
                                <div id="rotationsM" class="grow"></div>
                            </div>
                            <div class="grow">
                                <h2>Despidos por unidad</h2>
                                <div id="rotationsUnit" class="grow"> </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-4">
                            <div class="grow">
                                <h3>Recontratables</h3>
                                <div id="recontratables" class="grow"></div>
                            </div>
                            <div>
                                <h3>Renuncias Firmadas</h3>
                                <div id="firmas"></div>
                            </div>
                            <div>
                                <h3>Finiquitos Pagados</h3>
                                <div id="finiquitos"></div>
                            </div>

                            <div>
                                <h3>Entrevistados</h3>
                                <div id="entrevistas"></div>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
            @endif
            <br>
        </div>


    </div>
@endsection

@section('footer')

@endsection

@section('js-scripts')
    @vite('resources/js/capacitaciones.js')
    @vite('resources/js/attendance.js')
    @vite('resources/js/general.js')
    @vite('resources/js/salaries.js')
    @vite('resources/js/birthdays.js')
    @vite('resources/js/rotations.js')
@endsection
