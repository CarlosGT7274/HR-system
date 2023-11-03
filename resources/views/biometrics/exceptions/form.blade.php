@extends('layouts.form')

@section('inputs')
    <section class="w-5/6 md:w-2/3 lg:w-5/6 grid lg:grid-cols-2 lg:gap-x-20 gap-y-12">

        <div>
            <label for="id">id:</label>
            <x-input id="id" icon="" autocomplete=""
             type="number" max="" min="0" name="id" step="" 
                placeholder="id" />
        </div>

        <div>
            <label for="fecha_excep">Fecha de exepcion:</label>
            <x-input id="fecha_excep" icon="" 
            type="datetime-local" name="fecha_excep"
                placeholder="fecha_excep" />
        </div>
        <div>
            <label for="tiempoini">Fecha inicio:</label>
            <x-input id="tiempoini" icon="" autocomplete="" type="number"
                name="tiempoini" type="datetime-local" placeholder="Fecha inicio" />
        </div>

        <div>
            <label for="tiempofin">Fecha termino:</label>
            <x-input id="tiempofin" icon=""  type="datetime-local" name="tiempofin"
                placeholder="tiempofin" />
        </div>

        <div>
            <label for="observacion">Observaciones:</label>
            <x-input id="observacion" icon="" autocomplete="" type="text" 
            step="" name="observacion"
                placeholder="observaciones" />
        </div>

        <div>
            <label for="id_codpago">Codigo de pago:</label>
            <x-input id="id_codpago" icon="" autocomplete=""
             type="number" step='' min='0' max='' name="id_codpago"
                placeholder="Codigo de pago" />
        </div>

        <div>
            <label for="id_trabajador">Codigo del trabajador:</label>
            <x-input id="id_trabajador" icon="" 
            type="number" min='0' max='' step="" name="id_trabajador"
                placeholder="id_trabajador" />
        </div>
        
    </section>
@endsection
