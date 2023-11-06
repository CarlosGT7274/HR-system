@extends('layouts.form')

@section('inputs')
    <section class="w-5/6 md:w-2/3 lg:w-5/6 grid lg:grid-cols-2 lg:gap-x-20 gap-y-12">

        <div>
            <label for="poblacion">terminal id:</label>
            <x-input id="tipo" icon="" autocomplete="" type="number" max="" min="0" name="terminal_id" step="" 
                placeholder="terminal_id" defaultValue="" />
        </div>
                {{-- <input type="hidden" name="terminal_id" > --}}

        <div>
            <label for="poblacion">Número:</label>
            <x-input id="poblacion" icon="" autocomplete="" type="number" step='' min='0' max='' name="teminal_no"
                placeholder="teminal_no" defaultValue="" />
        </div>
        <div>
            <label for="tipo">Estado:</label>
            <x-input id="tipo" icon="" autocomplete="" type="number" max="1" min="0"
                name="estado" step="" placeholder="Estado" defaultValue="" />
        </div>

        <div>
            <label for="poblacion">Nombre:</label>
            <x-input id="poblacion" icon="" autocomplete="" type="text" name="nombre"
                placeholder="Nombre" defaultValue="" />
        </div>

        <div>
            <label for="region">Ubicación:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="ubicacion"
                placeholder="Ubicacion" defaultValue="" />
        </div>

        <div>
            <label for="region">Tipo de conexión:</label>
            <x-input id="region" icon="" autocomplete="" type="number" step='' min='0' max='' name="tipoconexion"
                placeholder="Tipo de conexión" defaultValue="" />
        </div>

        <div>
            <label for="pass">Contraseña:</label>
            <x-input id="pass" icon="" autocomplete="" type="password" step="" name="terminal_conectpwd"
                placeholder="terminal_conectpwd" defaultValue="123" />
        </div>
        <div>
            <label for="region">Nombre del Dominio:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_domainname"
                placeholder="terminal_domainname" defaultValue="" />
        </div>
        <div>
            <label for="region">Dirección TCP/IP:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_tcpip"
                placeholder="terminal_tcpip" defaultValue="" />
        </div>
        <div>
            <label for="region">Puerto:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_port"
                placeholder="terminal_port" defaultValue="" />
        </div>
        <div>
            <label for="region">Número Serial:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_serial"
                placeholder="terminal_serial" defaultValue="" />
        </div>
        <div>
            <label for="region">Tasa de Baudios:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_baudrate"
                placeholder="terminal_baudrate" defaultValue="" />
        </div>
        <div>
            <label for="region">Tipo:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_type"
                placeholder="terminal_type" defaultValue="" />
        </div>
        <div>
            <label for="region">Usuarios:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_users"
                placeholder="terminal_users" defaultValue="" />
        </div>

        <div>
            <label for="region">Huella Digital:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_fingerprints"
                placeholder="terminal_fingerprints" defaultValue="" />
        </div>

        <div>
            <label for="region">Punches:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_punches"
                placeholder="terminal_punches" defaultValue="" />
        </div>
        <div>
            <label for="region">faces:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_faces"
                placeholder="terminal_faces" defaultValue="" />
        </div>
        <div>
            <label for="region">zem:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_zem"
                placeholder="terminal_zem" defaultValue="" />
        </div>
        <div>
            <label for="region">kind:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_kind"
                placeholder="terminal_kind" defaultValue="" />
        </div>
        <div>
            <label for="region">IsSelect:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="IsSelect"
                placeholder="IsSelect" defaultValue="" />
        </div>
        <div>
            <label for="region">time checked:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_timechk"
                placeholder="terminal_timechk" defaultValue="" />
        </div>

        <div>
            <label for="region">last checked:</label>
            <x-input id="region" icon="" autocomplete="" type="text" step="" name="terminal_lastchk"
                placeholder="terminal_lastchk" defaultValue="" />
        </div>

    </section>
@endsection
