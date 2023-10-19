@extends('layouts.base')

@section('content')
    <div id="content" class="w-full">
        <form method="POST" action="{{ route('attendance.graph') }}" class="w-full">
            @csrf
            <div class="mb-4 grid grid-cols-5 w-full p-2">
                <div class="w-full pr-2">
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Selecciona una fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
        
                <div class="w-full pr-2">
                    <label for="Sunidad" class="block text-gray-700 text-sm font-bold mb-2">Unidad:</label>
                    <select name="unidad" id="Sunidad" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todas</option>
                        @foreach ($unidades as $item)
                            <option value="{{ $item['id_unidad'] }}">{{ $item['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="w-full pr-2">
                    <label for="Sregion" class="block text-gray-700 text-sm font-bold mb-2">Departamento:</label>
                    <select name="departamento" id="Sregion" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todos</option>
                        @foreach ($departamentos as $item)
                            <option value="{{ $item['id_departamento'] }}">{{ $item['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="w-full pr-2">
                    <label for="Spositions" class="block text-gray-700 text-sm font-bold mb-2">Puesto:</label>
                    <select name="posiciones" id="Spositions" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Todos</option>
                        @foreach ($posiciones as $item)
                            <option value="{{ $item['id_puesto'] }}">{{ $item['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full pr-2">
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

        
        
        <div id="graphics" class="flex flex-wrap gap-4 p-4 sm:p-6 md:p-10 w-full">

            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px]">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">General</h2>
                </header>
                <div class="flex flex-row bg-white">
                    <div id="general" class="grow">
                        <input type="hidden" name="" id="jsonG" value="{{ json_encode($general) }}">
                    </div>
                    <div id="capacitaciones" class="grow">
                        <input type="hidden" name="" id="jsonCa" value="{{ json_encode($general) }}">
                    </div>
                </div>    
            </div>

            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px] ">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Asistencias</h2>
                </header>
                <div id="attendance" class="grow">
                    <input type="hidden" name="" id="jsonatt" value="{{ json_encode($attendance) }}">
                </div>
            </div>

            {{-- <div class="grid grid-cols-2 justify-center w-full gap-6 "> --}}

            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px] ">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Cumpleaños</h2>
                </header>
                <div id="birthdays" class="grow">
                    <input type="hidden" name="" id="jsonB" value="{{ json_encode($birthdays) }}">
                    <ul class="space-y-4">
                        @foreach ($birthdays as $employee)
                            @if (is_array($employee))
                                @foreach ($employee as $key => $employeeData)
                                    <li class="bg-white rounded-lg shadow-md p-4">
                                        <div class="text-lg font-semibold">{{ $employeeData['nombre'] }} {{ $employeeData['apellidoP'] }} {{ $employeeData['apellidoM'] }}</div>
                                        <div class="text-gray-600">{{ $employeeData['cumpleaños'] }}</div>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px]">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Rotaciones</h2>
                </header>
                <div class="flex flex-row bg-white ">
                    
                    <div id="rotations" class="grow">
                        <input type="hidden" name="" id="jsonR" value="{{ json_encode($rotations) }}">
                    </div>
                    <div id="rotationsUnit" class="grow">
                        {{-- <input type="hidden" name="" id="jsonR" value="{{ json_encode($rotations) }}"> --}}
                    </div>
                </div>
            </div>
                
            <div class="flex flex-col bg-white dark:bg-slate-800 shadow-lg rounded-[15px] ">
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
