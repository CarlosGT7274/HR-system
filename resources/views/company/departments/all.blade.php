@extends('layouts.base')

@section('content')
    <main>
        <header>
            <h1>Todos los departamentos</h1>
        </header>
        <article class="w-1/2">
            @foreach ($data as $item)
                <section class="flex flex-row gap-8 border-b-2 border-b-ldark p-2 hover:border-b-primary">
                    <form class="flex flex-row flex-1 justify-between" method="POST">
                        @csrf
                        <input type="text" name="nombre" readonly value="{{ $item['nombre'] }}"
                            id="in_{{ $item['id_departamento'] }}">

                        <div>
                            <button type="button" onclick="habilitarEdicion({{ $item['id_departamento'] }})">
                                <i class="fa fa-pencil"></i>
                            </button>

                            <button class="me-4" type="submit" style="display: none;">
                                <i class="fa fa-floppy-disk"></i>
                            </button>

                            <button type="button" style="display: none;" id="cancelar_{{ $item['id_departamento'] }}">
                                <i class="fa fa-xmark"></i>
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('departments.delete', ['id' => $item['id_departamento']]) }}">
                        @csrf
                        @method('DELETE')
                        <input hidden name="{{ $item['id_departamento'] }}">
                        <button type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </section>
            @endforeach
        </article>
    </main>
@endsection

@section('js-scripts')
    <script>
        function habilitarEdicion(id) {
            const input = document.getElementById('in_' + id)
            const initialValue = input.value

            const edit_btn = document.querySelector(`button[onclick="habilitarEdicion(${id})"]`)
            const save_btn = input.parentElement.querySelector('button[type="submit"]')
            const cancel_btn = document.getElementById('cancelar_' + id)

            input.removeAttribute('readonly')
            edit_btn.style.display = 'none'
            save_btn.style.display = 'inline-block'
            cancel_btn.style.display = 'inline-block'

            input.selectionStart = input.value.length;
            input.focus();

            save_btn.onclick = function() {
                input.setAttribute('readonly', 'readonly')
                save_btn.style.display = 'none'
                cancel_btn.style.display = 'none'
                edit_btn.style.display = 'inline-block'
                save_btn.parentElement.parentElement.submit()
            }

            cancel_btn.onclick = function() {
                input.setAttribute('readonly', 'readonly')
                save_btn.style.display = 'none'
                cancel_btn.style.display = 'none'
                edit_btn.style.display = 'inline-block'
                input.value = initialValue
            }
        }
    </script>
@endsection
