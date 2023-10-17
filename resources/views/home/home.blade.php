@extends('layouts.base')

@section('content')
    <div id="content" class="w-full">
        <form method="get" action="{{ route('attendance.graph') }}" class="max-w-sm mx-auto">
            <div class="mb-4">
                <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Selecciona una fecha:</label>
                <input type="date" name="fecha" id="fecha" class="border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($errors->has('fecha'))
                    <p class="text-red-500 text-xs mt-2">{{ $errors->first('fecha') }}</p>
                @endif
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Enviar</button>
        </form>
        
        

        <div id="graphics" class="grid grid-cols-3 gap-6 w-[1660px] p-10">
            <div className="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header className="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center">
                  <h2 className="font-semibold text-slate-800 dark:text-slate-100">Asistencias</h2>
                </header>
                <div id="attendance" class="grow" >
                    <input type="hidden" name="" id="jsonatt" value="{{json_encode($attendance)}}">
                </div>
            </div>

            <div className="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header className="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 className="font-semibold text-slate-800 dark:text-slate-100">Salarios</h2>
                </header>
                <div id="salaries" class="grow">
                    <input type="hidden" name="" id="jsonS" value="{{json_encode($salaries)}}">
                </div>
            </div>
            
            <div className="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header className="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 className="font-semibold text-slate-800 dark:text-slate-100">General</h2>
                </header>
                <div id="general" class="grow">
                    <input type="hidden" name="" id="jsonG" value="{{json_encode($general)}}">
                </div>
            </div>

            <div class="grid grid-cols-2 justify-center w-[1600px] gap-6">

            <div className="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header className="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 className="font-semibold text-slate-800 dark:text-slate-100">Cumpleaños</h2>
                </header>
                <div id="birthdays" class="grow">
                    <input type="hidden" name="" id="jsonB" value="{{json_encode($birthdays)}}">
                </div>    
            </div>
            
            <div className="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header className="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 className="font-semibold text-slate-800 dark:text-slate-100">Rotaciones</h2>
                </header>
                <div id="rotations" class="grow">
                    <input type="hidden" name="" id="jsonR" value="{{json_encode($rotations)}}">
                </div>  
            </div>  

            </div>
            
        </div>
            
    </div>
@endsection

@section('footer')
@endsection

@section('js-scripts')
  @vite("resources/js/attendance.js")
  @vite("resources/js/general.js")
  @vite("resources/js/salaries.js")
  @vite("resources/js/birthdays.js")
  @vite("resources/js/rotations.js")
@endsection
