@extends('layouts.form')

@section('inputs')
    <section class="w-5/6 md:w-2/3 lg:w-5/6 grid xl:grid-cols-9 xl:gap-x-20 gap-y-12">

        <div class="xl:col-start-1 xl:col-end-4">
            <label for="poblacion">terminal No:</label>
            <x-input id="tipo" icon="" autocomplete="" type="number" max="" min="0" name="terminal_id" step="" 
                placeholder="terminal_id" defaultValue="" />
        </div>
                {{-- <input type="hidden" name="terminal_id" > --}}

        <div class="xl:col-start-1 xl:col-end-4">
            <label for="poblacion">terminal No:</label>
            <x-input id="poblacion" icon="" autocomplete="" type="number" step='' min='0' max='' name="teminal_no"
                placeholder="teminal_no" defaultValue="" />
        </div>
        <div class="xl:col-start-4 xl:col-end-7">
            <label for="tipo">Estado:</label>
            <x-input id="tipo" icon="" autocomplete="" type="number" max="" min="0"
                name="terminal_status" step="" placeholder="terminal_status" defaultValue="" />
        </div>

        <div class="xl:col-start-7 xl:col-end-10">
            <label for="poblacion">Nombre:</label>
            <x-input id="poblacion" icon="" autocomplete="" type="text" name="terminal_name"
                placeholder="terminal_name" defaultValue="" />
        </div>

        <div class="xl:col-start-2 xl:col-end-5">
            <label for="region">Ubicacion del Terminal:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_location"
                placeholder="terminal_location" defaultValue="" />
        </div>

        <div class="xl:col-start-6 xl:col-end-9">
            <label for="region">Tipo de conexion:</label>
            <x-input id="region" icon="" autocomplete="" type="number" step='' min='0' max='' name="termnal_conecttype"
                placeholder="termnal_conecttype" defaultValue="" />
        </div>

        <div class="xl:col-start-1 xl:col-end-4">
            <label for="region">terminal conectpwd:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_conectpwd"
                placeholder="terminal_conectpwd" defaultValue="" />
        </div>
        <div class="xl:col-start-4 xl:col-end-7">
            <label for="region">nombre de dominio del terminal::</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_domainname"
                placeholder="terminal_domainname" defaultValue="" />
        </div>
        <div class="xl:col-start-7 xl:col-end-10">
            <label for="region">terminal tcp/ip:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_tcpip"
                placeholder="terminal_tcpip" defaultValue="" />
        </div>
        <div class="xl:col-start-2 xl:col-end-5">
            <label for="region">terminal puerto:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_port"
                placeholder="terminal_port" defaultValue="" />
        </div>
        <div class="xl:col-start-6 xl:col-end-9">
            <label for="region">serial del terminal:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_serial"
                placeholder="terminal_serial" defaultValue="" />
        </div>
        <div class="xl:col-start-1 xl:col-end-4">
            <label for="region">terminal baudrate:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_baudrate"
                placeholder="terminal_baudrate" defaultValue="" />
        </div>
        <div class="xl:col-start-7 xl:col-end-10">
            <label for="region">terminal tipo:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_type"
                placeholder="terminal_type" defaultValue="" />
        </div>
        <div class="xl:col-start-2 xl:col-end-5">
            <label for="region">terminal usuarios:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_users"
                placeholder="terminal_users" defaultValue="" />
        </div>

        <div class="xl:col-start-6 xl:col-end-9">
            <label for="region">huella digital:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_fingerprints"
                placeholder="terminal_fingerprints" defaultValue="" />
        </div>

        <div class="xl:col-start-1 xl:col-end-4">
            <label for="region">terminal punches:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_punches"
                placeholder="terminal_punches" defaultValue="" />
        </div>
        <div class="xl:col-start-4 xl:col-end-7">
            <label for="region">terminal faces:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_faces"
                placeholder="terminal_faces" defaultValue="" />
        </div>
        <div class="xl:col-start-7 xl:col-end-10">
            <label for="region">terminal zem:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_zem"
                placeholder="terminal_zem" defaultValue="" />
        </div>
        <div class="xl:col-start-2 xl:col-end-5">
            <label for="region">terminal kind:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_kind"
                placeholder="terminal_kind" defaultValue="" />
        </div>
        <div class="xl:col-start-6 xl:col-end-9">
            <label for="region">IsSelect:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="IsSelect"
                placeholder="IsSelect" defaultValue="" />
        </div>
        <div class="xl:col-start-1 xl:col-end-4">
            <label for="region">terminal timechk:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_timechk"
                placeholder="terminal_timechk" defaultValue="" />
        </div>

        <div class="xl:col-start-7 xl:col-end-10">
            <label for="region">terminal lastchk:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_lastchk"
                placeholder="terminal_lastchk" defaultValue="" />
        </div>

    </section>
@endsection
