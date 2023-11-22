@extends('layouts.one')

@section('title')
    <h1 class="text-2xl font-semibold flex-1">{{ $data['nombre'] }}</h1>
@endsection

@section('inputs')
    <section class="w-5/6 md:w-2/3 xl:w-5/6 grid grid-cols-1 gap-x-8 gap-y-8 mx-auto">
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Nombre:</label>
            <div class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1 flex flex-row">
                <input class="w-auto" type="text" name="nombre" readonly value="{{ $data['nombre'] }}" id="name">
                <p>.{{ app('file_extensions')[$data['tipo']] }}</p>
            </div>
            <script>
                const input = document.getElementById('name')
                input.addEventListener('input', resizeInput);
                resizeInput.call(input);

                function resizeInput() {
                    let contador = 0;

                    for (let i = 0; i < this.value.length; i++) {
                        if (this.value[i] === ' ') {
                            contador++;
                        }
                    }
                    console.log("🚀 ~ file: one.blade.php:24 ~ resizeInput ~ this.value.length:", this.value.length)

                    let multiplier = 0.945 ;

                    this.style.width = ((this.value.length * multiplier) - (0.44 * contador)) + "ch";
                }
            </script>

        </div>
        <div>
            <div class="h-96" id="drop-area">
                <label for="file-input"
                    class="h-full w-full border-4 border-ldark border-dashed flex flex-col justify-center items-center rounded-lg cursor-pointer gap-4 ">
                    <i class="fa-solid fa-file text-ldark text-5xl"></i>
                    <p class="py-3 px-6 text-center text-xl">Elija un archivo o arrástrelo hasta aquí</p>
                </label>

                <input name="archivo" id="file-input" class="hidden" type="file"
                    accept=".rtf,.doc,.docx,.csv,.xls,.xlsx,.ppt,.pptx,.rar,.7z,.zip,.txt,.pdf,.xml,.json,.mp3,.wav,.mp4,.avi,.webm,.jpg,.jpeg,.png,.gif,.bmp,.svg,.webp">
            </div>

            <div id="file_container"
                class="hidden h-72 w-full border-2 border-ldark border-dashed flex-col justify-center items-center rounded-lg cursor-pointer relative">
                <i class="fa-solid text-5xl" id="file_icon"></i>
                <p class="py-2 px-6 text-center text-xl font-semibold" id="file_name"></p>
                <button
                    class="absolute top-[-0.85rem] right-[-0.85rem] border-2 rounded-full border-danger w-7 h-7 bg-light"
                    type="button" id="remove">
                    <i class="fa-solid fa-lg fa-trash-can text-danger" id="file_icon"></i>
                </button>
            </div>
        </div>

        @vite('resources/js/dragAndDrop.js')
        @vite('resources/js/docsInput.js')
    </section>
@endsection
