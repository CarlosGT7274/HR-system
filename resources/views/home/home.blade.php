@extends('layouts.base')

@section('content')
    <div id="content" class="w-full">
        <form method="POST" action="{{ route('attendance.graph') }}" class="w-full">
            @csrf
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 p-2">
                <div class="w-full">
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Selecciona una fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
        
                <div class="w-full">
                    <label for="Sunidad" class="block text-gray-700 text-sm font-bold mb-2">Unidad:</label>
                    <select name="unidad" id="Sunidad" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todas</option>
                        @foreach ($unidades as $item)
                            <option value="{{ $item['id_unidad'] }}">{{ $item['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="w-full">
                    <label for="Sregion" class="block text-gray-700 text-sm font-bold mb-2">Departamento:</label>
                    <select name="departamento" id="Sregion" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todos</option>
                        @foreach ($departamentos as $item)
                            <option value="{{ $item['id_departamento'] }}">{{ $item['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="w-full">
                    <label for="Spositions" class="block text-gray-700 text-sm font-bold mb-2">Puesto:</label>
                    <select name="posiciones" id="Spositions" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todos</option>
                        @foreach ($posiciones as $item)
                            <option value="{{ $item['id_puesto'] }}">{{ $item['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="w-full">
                    <label for="Sregion" class="block text-gray-700 text-sm font-bold mb-2">Region:</label>
                    <select name="region" id="Sregion" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todas</option>
                        @foreach ($unidades as $item)
                            <option value="{{ $item['region'] }}">{{ $item['region'] }}</option>
                        @endforeach
                    </select>
                </div>
        
                @if ($errors->has('fecha'))
                    <p class="w-full text-red-500 text-xs mt-2">{{ $errors->first('fecha') }}</p>
                @endif
            </div>
        
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Enviar</button>
        </form>
        

        
        
        <div id="graphics" class="grid grid-cols-3 gap-4 w-full px-8 ">

            <div class=" col-span-3 flex flex-col shadow-lg rounded-[15px] ">
                <header class="px-5 py-2 mt-2 mb-4 border-b border-dark ">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">General</h2>
                </header>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-12 xl:flex-row bg-white">
                    <div class="flex xl:flex-col justify-evenly xl:justify-around content-center px-3 py-2 xl:py-0 w-full md:col-start-1 md:col-end-3 xl:col-span-1">
                        <div class="flex flex-col items-center">
                            <h3><i class="fa-solid fa-xl fa-people-group"></i></h3>
                            <span class="font-semibold">{{$general['data']['total']}}</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <h3><i class="fa-solid fa-xl fa-person text-secondary"></i></h3>
                            <span class="font-semibold">{{$general['data']['hombres']['total']}}</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <h3><i class="fa-solid fa-xl fa-person-dress text-fuchsia-400"></i></h3>
                            <span class="font-semibold">{{$general['data']['mujeres']['total']}}</span>
                        </div>
                    </div>

                    <div id="general" class="w-full p-3 xl:p-0 xl:col-span-3">
                        <input type="hidden" name="" id="jsonG" value="{{ json_encode($general) }}">
                    </div>

                    <div id="childs" class="w-full p-3 xl:p-0 xl:col-span-3">
                    </div>

                    <div id="capacitaciones" class="w-full p-3 xl:p-0 xl:col-span-3">
                        <input type="hidden" name="" id="jsonCa" value="{{ json_encode($general) }}">
                    </div>

                    <div class="w-full p-3 xl:p-0 xl:col-span-2">
                        <header class="px-5">
                            <h2 class="font-semibold text-slate-800 dark:text-slate-100">Cumpleaños</h2>
                        </header>
                        <ul class="overflow-y-auto h-32">
                            @foreach ($birthdays as $employee)
                                @if (is_array($employee))
                                    @foreach ($employee as $key => $employeeData)
                                        <li class="bg-light p-4 ">
                                            <div class="text-sm font-semibold">{{ $employeeData['nombre'] }} {{ $employeeData['apellidoP'] }} {{ $employeeData['apellidoM'] }}</div>
                                            <div class="text-dlight text-xs">{{ $employeeData['cumpleaños'] }}</div>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>    
            </div>

            

            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px] col-start-1 col-end-4 md:col-start-1 md:col-end-2  md:col-span-3">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Asistencias</h2>
                </header>
                <div id="attendance" class="grow">
                    <input type="hidden" name="" id="jsonatt" value="{{ json_encode($attendance) }}">
                </div>
            </div>

            {{-- <div class="grid grid-cols-2 justify-center w-full gap-6 "> --}}


            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px] col-start-1 col-end-4 md:col-start-2 md:col-end-4  md:col-span-3">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Rotaciones</h2>
                </header>
                <div class=" bg-white grid grid-cols-1 xl:grid-cols-2">
                    
                    <div id="rotations" class="grow">
                        <input type="hidden" name="" id="jsonR" value="{{ json_encode($rotations) }}">
                    </div>
                    <div id="rotationsUnit" class="grow">
                        {{-- <input type="hidden" name="" id="jsonR" value="{{ json_encode($rotations) }}"> --}}
                    </div>
                </div>
            </div>
                
            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px] md:col-span-3 col-start-1 col-end-4 md:col-start-1 md:col-end-2">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Salarios</h2>
                </header>
                <div id="salaries" class="grow">
                    <input type="hidden" name="" id="jsonS" value="{{ json_encode($salaries) }}">
                </div>
            </div>
            {{-- </div> --}}
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
