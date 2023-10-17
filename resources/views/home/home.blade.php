@extends('layouts.base')

@section('navbar')
    <nav class="flex justify-between lg:hidden p-4 bg-dark">
        <header class="flex justify-between items-center space-x-3">
            @include('svg.logo')
            <p class="text-2xl leading-6 text-light">On the minute</p>
        </header>
        <button aria-label="open" id="open" onclick="showNav(true)" class="hidden focus:outline-none focus:ring-2">
            <i class="fa-solid fa-bars fa-xl text-light"></i>
        </button>
        <button aria-label="close" id="close" onclick="showNav(true)" class=" focus:outline-none focus:ring-2">
            <i class="fa-solid fa-xmark fa-xl text-light"></i>
        </button>
    </nav>

    <section id="Main"
        class="h-[100vh] sticky top-0 lg:rounded-r sm:w-64 bg-dark transform xl:translate-x-0 ease-in-out transition duration-500">
        <header class="hidden lg:flex justify-start p-6 items-center space-x-3">
            @include('svg.logo')
            <h1 class="text-2xl leading-6 text-light">On the minute</h1>
        </header>

        <nav>
            <a
                class="flex items-center gap-6 hover:text-secondary text-light mt-6 border-ldark border-b-2 pb-5 ps-4 cursor-pointer">
                <object class="grid grid-cols-2 gap-1 h-6 items-center">
                    <i class="fa-regular fa-square fa-2xs"></i>
                    <i class="fa-regular fa-square fa-2xs"></i>
                    <i class="fa-regular fa-square fa-2xs"></i>
                    <i class="fa-regular fa-square fa-2xs"></i>
                </object>

                <p class="text-base">Dashboard</p>
            </a>

            <div>
                {{-- @foreach ($menuItems as $menuItem)
                    <div class="flex flex-col justify-start items-center   px-6 border-b border-gray-600 w-full  ">
                        <button onclick="showMenu{{ $loop->index + 1 }}(true)"
                            class="focus:outline-none focus:text-indigo-400 text-left text-white flex justify-between items-center w-full py-5 space-x-14">
                            <p class="text-sm leading-5 uppercase">{{ $menuItem['title'] }}</p>
                            <svg id="{{ $menuItem['icon'] }}" class="transform rotate-180" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div id="menu{{ $loop->index + 1 }}"
                            class="hidden flex justify-start flex-col items-start pb-5 m-0">
                            @foreach ($menuItem['subMenu'] as $subMenuItem)
                                <a
                                    class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-52">
                                    <p class="text-base leading-4">{{ $subMenuItem }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach --}}
            </div>

            </div>
        </nav>

        <section class="flex flex-col p-6 w-full pt-32 ">
            <p class="cursor-pointer text-sm leading-5 text-light">
                {{ session('user')['nombre'] . ' ' . session('user')['apellidoP'] . ' ' . session('user')['apellidoM'] }}
            </p>
            <p class="cursor-pointer text-xs leading-3 text-ldark">{{ session('user')['email'] }}</p>
        </section>

    </section>
@endsection

@section('content')
    <div id="content" class="w-full">
        <form method="get">
            <input type="date" name="fecha">

            @if ($errors->has('fecha'))
                <span class="text-danger">{{ $errors->first('fecha') }}</span>
            @endif

            <button type="submit"> Enviar </button>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p>Hola</p>
    </div>
@endsection

@section('footer')
@endsection


@section('js-scripts')
    <script>
        let icon1 = document.getElementById("icon1");
        let menu1 = document.getElementById("menu1");
        const showMenu1 = (flag) => {
            if (flag) {
                icon1.classList.toggle("rotate-180");
                menu1.classList.toggle("hidden");
            }
        };

        let icon2 = document.getElementById("icon2");
        let menu2 = document.getElementById("menu2");
        const showMenu2 = (flag) => {
            if (flag) {
                icon2.classList.toggle("rotate-180");
                menu2.classList.toggle("hidden");
            }
        };

        let icon3 = document.getElementById("icon3");
        let menu3 = document.getElementById("menu3");
        const showMenu3 = (flag) => {
            if (flag) {
                icon3.classList.toggle("rotate-180");
                menu3.classList.toggle("hidden");
            }
        };

        let Main = document.getElementById("Main");
        let open = document.getElementById("open");
        let close = document.getElementById("close");

        const showNav = (flag) => {
            if (flag) {
                Main.classList.toggle("-translate-x-full");
                Main.classList.toggle("translate-x-0");
                Main.classList.toggle("hidden");
                open.classList.toggle("hidden");
                close.classList.toggle("hidden");
            }
        };
    </script>
@endsection
