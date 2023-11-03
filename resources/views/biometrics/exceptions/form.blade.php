@extends('layouts.form')

@section('inputs')
    <section class="w-5/6 md:w-2/3 lg:w-5/6 grid lg:grid-cols-2 lg:gap-x-20 gap-y-12">

        <div>
            <label for="poblacion">id:</label>
            <x-input id="tipo" icon="" autocomplete=""
             type="number" max="" min="0" name="id" step="" 
                placeholder="id" defaultValue="" />
        </div>

        <div>
            <label for="poblacion">Fecha de exepcion:</label>
            <x-input id="poblacion" icon="" 
            type="datetime-local" step="1" name="fecha_excep"
                placeholder="fecha_excep" defaultValue="" />
        </div>
        <div>
            <label for="tipo">Fecha inicio:</label>
            <x-input id="tipo" icon="" autocomplete="" type="number"
                name="tiempoini" type="datetime-local" step="1" placeholder="Fecha inicio" defaultValue="" />
        </div>

        <div>
            <label for="poblacion">Fecha termino:</label>
            <x-input id="poblacion" icon=""  type="datetime-local" 
            step="1" name="tiempofin"
                placeholder="tiempofin" defaultValue="" />
        </div>

        <div>
            <label for="region">Observaciones:</label>
            <x-input id="region" icon="" autocomplete="" type="text" 
            step="" name="observacion"
                placeholder="observaciones" defaultValue="" />
        </div>

        <div>
            <label for="region">Codigo de pago:</label>
            <x-input id="region" icon="" autocomplete=""
             type="number" step='' min='0' max='' name="id_codpag"
                placeholder="Codigo de pago" defaultValue="" />
        </div>

        <div>
            <label for="pass">Codigo del trabajador:</label>
            <x-input id="pass" icon="" 
            type="number" min='0' max='' step="" name="id_trabajador"
                placeholder="id_trabajador" defaultValue="" />
        </div>
        
    </section>
@endsection
