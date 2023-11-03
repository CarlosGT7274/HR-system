@extends('layouts.base')

@section('content')
    <main class="w-full p-6">
        <article class="w-full flex flex-col">
            <header class="h-12 border-b-2 border-primary mb-2 flex flex-row justify-between items-baseline gap-5">
                <a href="{{ route($base_route . '.all') }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>

                @yield('title')

                <form method="POST" {{-- {{dd($id_name)}} --}}
                    @if (substr($id_name, -2) === 'id') action="{{ route($base_route . '.delete', ['id' => $data[$id_name]]) }}"
                @else
                    action="{{ route($base_route . '.delete', ['id' => $data['id_' . $id_name]]) }}" @endif>
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fa-solid fa-lg fa-trash-can hover:text-danger"></i>
                    </button>
                </form>
            </header>


            <form class="mt-6 border-b-2 border-b-ldark pb-5" method="POST"
                @if (substr($id_name, -2) === 'id') action="{{ route($base_route . '.update', ['id' => $data[$id_name]]) }}"
            @else
                action="{{ route($base_route . '.update', ['id' => $data['id_' . $id_name]]) }}" @endif>
                @csrf
                @method('PUT')

                <header class="mb-4 flex flex-row gap-5 items-center">
                    <h2 class="text-xl font-semibold">Atributos</h2>
                    <div>
                        <button id="activar" type="button" onclick="habilitarEdicion()">
                            <i class="fa-solid fa-lg fa-pencil"></i>
                        </button>

                        <button id="enviar" class="me-4 hover:text-success hidden" type="submit">
                            <i class="fa-solid fa-floppy-disk fa-lg"></i>
                        </button>

                        <button class="hover:text-danger hidden" onclick="cancelarEdicion()" type="button" id="cancelar">
                            <i class="fa-solid fa-xmark fa-lg"></i>
                        </button>
                    </div>
                </header>

                @yield('inputs')

            </form>

            @yield('extra-info')

        </article>
    </main>
@endsection


@section('js-scripts')
    <script>
        function habilitarEdicion() {
            const inputs = document.getElementsByTagName("input")
            const selects = document.getElementsByTagName("select")
            for (let i = 0; i < inputs.length || i < selects.length; i++) {
                if (i < inputs.length) {
                    inputs[i].removeAttribute("readonly")
                    inputs[i].style.cursor = "auto"
                    inputs[i].style.color = "#0d0d0d"
                    inputs[i].style.borderColor = "#0F4B80"

                    if (inputs[i].type == 'radio') {
                        const labels = inputs[i].parentElement.getElementsByTagName('label')

                        for (let j = 0; j < labels.length; j++) {
                            labels[j].style.color = "#0d0d0d"
                            labels[j].style.cursor = "pointer"
                        }

                        inputs[i].parentElement.parentElement.style.borderColor = "#0F4B80"
                    }
                }

                if (i < selects.length) {
                    selects[i].removeAttribute("disabled")
                    selects[i].style.cursor = "auto"
                    selects[i].style.borderColor = "#0F4B80"
                }
            }

            // Mostrar botón de envío y botón de cancelar
            document.getElementById("activar").style.display = "none"
            document.getElementById("enviar").style.display = "inline"
            document.getElementById("cancelar").style.display = "inline"
        }

        function cancelarEdicion() {
            const inputs = document.getElementsByTagName("input")
            const selects = document.getElementsByTagName("select")

            for (let i = 0; i < inputs.length || i < selects.length; i++) {
                if (i < inputs.length) {
                    inputs[i].setAttribute("readonly", "readonly")
                    inputs[i].style.cursor = "default"
                    inputs[i].style.color = "#8c8c8b"
                    inputs[i].style.borderColor = "#8c8c8b"

                    if (inputs[i].type === 'radio') {
                        const labels = inputs[i].parentElement.getElementsByTagName('label')

                        for (let j = 0; j < labels.length; j++) {
                            labels[j].style.color = "#8c8c8b"
                            labels[j].style.cursor = "default"
                        }

                        inputs[i].parentElement.parentElement.style.borderColor = "#8c8c8b"
                    } else {
                        inputs[i].value = inputs[i].defaultValue
                    }
                }

                if (i < selects.length) {
                    selects[i].setAttribute("disabled", "disabled")
                    selects[i].style.cursor = "auto"
                    selects[i].style.borderColor = "#8c8c8b"
                }
            }

            // Ocultar botón de envío y botón de cancelar
            document.getElementById("activar").style.display = "inline"
            document.getElementById("enviar").style.display = "none"
            document.getElementById("cancelar").style.display = "none"
        }
    </script>
@endsection
