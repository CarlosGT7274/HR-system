<section class="flex justify-between lg:hidden p-4 bg-dark">
    <header class="flex justify-between items-center space-x-3">
        @include('svg.logo')
        <p class="text-2xl text-light">On the minute</p>
    </header>
    <button aria-label="open navbar" id="open" onclick="showNav(true)" class="hidden focus:outline-none focus:ring-2">
        <i class="fa-solid fa-bars fa-xl text-light"></i>
    </button>
    <button aria-label="close navbar" id="close" onclick="showNav(false)" class=" focus:outline-none focus:ring-2">
        <i class="fa-solid fa-xmark fa-xl text-light"></i>
    </button>
</section>

<section id="navbar-conatiner"
    class="h-[100vh] sticky top-0 flex flex-col lg:rounded-r sm:w-64 bg-dark ease-in-out transition duration-1000">
    <header class="hidden lg:flex justify-start py-6 ps-2 items-center">
        @include('svg.logo')
        <h1 class="text-2xl text-light ps-3">On the minute</h1>
    </header>

    <nav class="mt-6 text-light">
        <a class="flex items-center gap-6 hover:text-ldark border-ldark border-b-2 pb-5 ps-4 cursor-pointer">
            <object class="grid grid-cols-2 gap-1 h-6 items-center">
                <i class="fa-regular fa-square fa-2xs"></i>
                <i class="fa-regular fa-square fa-2xs"></i>
                <i class="fa-regular fa-square fa-2xs"></i>
                <i class="fa-regular fa-square fa-2xs"></i>
            </object>

            <p class="text-base">Dashboard</p>
        </a>

        @foreach ($menuItems as $menuItem)
            <section class="flex flex-col items-center px-6 border-b-2 border-ldark">
                <button onclick="showMenu({{ $loop->index }})"
                    class="flex justify-between items-center w-full py-5 hover:text-ldark">
                    <p class="text-sm uppercase">{{ $menuItem['title'] }}</p>
                    <i id="icon{{ $loop->index }}" class="fa-solid fa-angle-down"></i>
                </button>
                <div id="menu{{ $loop->index }}" class="hidden flex-col pb-5">
                    @foreach ($menuItem['subMenu'] as $subMenuItem)
                        <a class="hover:text-light hover:bg-dlight text-ldark rounded ps-3 py-2 w-52 cursor-pointer">
                            {{ $subMenuItem }}
                        </a>
                    @endforeach
                </div>
            </section>
        @endforeach

        <a class="flex flex-col px-6 lg:pt-9 lg:pb-6 pt-5 pb-24 absolute bottom-0 bg-dark cursor-pointer w-full">
            <p class="text-sm text-light">
                {{ session('user')['nombre'] . ' ' . session('user')['apellidoP'] . ' ' . session('user')['apellidoM'] }}
            </p>
            <p class="text-xs text-ldark">{{ session('user')['email'] }}</p>
        </a>
    </nav>
</section>

<script>
    function showMenu(id) {
        const icon = document.getElementById(`icon${id}`);
        const menu = document.getElementById(`menu${id}`);

        icon.classList.toggle("rotate-180");
        menu.classList.toggle("hidden");
        menu.classList.toggle("flex");
    }
</script>

<script>
    const navbar = document.getElementById("navbar-conatiner");
    const openBtn = document.getElementById("open");
    const closeBtn = document.getElementById("close");

    function showNav(flag) {
        if (flag) {
            navbar.classList.remove("hidden");
            openBtn.classList.add("hidden");
            closeBtn.classList.remove("hidden");
        } else {
            navbar.classList.add("hidden");
            openBtn.classList.remove("hidden");
            closeBtn.classList.add("hidden");
        }
    }

    const handleResize = () => {
        if (window.innerWidth >= 1024) {
            showNav(true);
        } else {
            showNav(false);
        }
    };

    window.addEventListener("resize", handleResize);

    
</script>
