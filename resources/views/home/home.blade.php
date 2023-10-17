@extends('layouts.base')

@section('content')
    <div id="content" class="w-full">
        <form method="get">
            <input type="date" name="fecha">

            @if ($errors->has('fecha'))
                <span class="text-danger">{{ $errors->first('fecha') }}</span>
            @endif

            <button type="submit"> Enviar </button>
        </form>
        

        <div id="graphics" class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            
            <div id="attendance" >
                    <input type="hidden" name="" id="jsonatt" value="{{json_encode($attendance)}}">
            </div>


            <div className="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header className="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 className="font-semibold text-slate-800 dark:text-slate-100">Salarios</h2>
                </header>
                    {{-- Chart built with Chart.js 3  --}}
                    {{-- Change the height attribute to adjust the chart height  --}}
                {{-- <BarChart data={chartData} width={595} height={248} /> --}}
                <div class="px-5 py-3" id="salaries2">

                </div>
            </div>
            

            <div id="general" class="">
                <input type="hidden" name="" id="jsonG" value="{{json_encode($general)}}">
            </div>

            <div id="salaries" class="">
                <input type="hidden" name="" id="jsonS" value="{{json_encode($salaries)}}">
            </div>

            <div id="birthdays" class="">
                <input type="hidden" name="" id="jsonB" value="{{json_encode($birthdays)}}">
            </div>

            <div id="rotations" class="">
                <input type="hidden" name="" id="jsonR" value="{{json_encode($rotations)}}">
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
