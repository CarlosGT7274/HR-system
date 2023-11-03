@extends('layouts.one')

@section('title')
    <h1 class="text-2xl font-semibold flex-1">{{ $data['terminal_name'] }}</h1>
@endsection


@section('inputs')
    <section class="w-5/6 md:w-2/3 xl:w-5/6 grid xl:grid-cols-2 gap-x-8 gap-y-8 mx-auto">
            <input type="hidden" name="terminal_id" readonly
                value="{{ $data['terminal_id'] }}" >
        
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Número: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="teminal_no" readonly
                value="{{ $data['teminal_no'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Estado: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_status" readonly
                value="{{ $data['terminal_status'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Nombre: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_name" readonly
                value="{{ $data['terminal_name'] }}" id="name" >
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Ubicación: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_location" readonly
                value="{{ $data['terminal_location'] }}" id="name" >
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Tipo de conexión: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="termnal_conecttype" readonly
                value="{{ $data['termnal_conecttype'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="password">Contraseña: </label>
                <input type="password" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_conectpwd" readonly
                    value="{{ $data['terminal_conectpwd'] }}" id="password">
                    <button type="button" onclick="alternar()"><i class="fa-solid fa-eye"></i></button>
                
                <script>
                    function alternar(){
                        const input = document.getElementById('password')
                        const type = input.type

                        if(type === 'password'){
                            input.type = 'text'
                        }
                        else {
                            input.type = 'password'
                        }
                    }
                </script>
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Nombre del Dominio: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_domainname" readonly
                value="{{ $data['terminal_domainname'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Dirección TCP/IP: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_tcpip" readonly
                value="{{ $data['terminal_tcpip'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Puerto: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_port" readonly
                value="{{ $data['terminal_port'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Número Serial: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_serial" readonly
                value="{{ $data['terminal_serial'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Tasa de Baudios: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_baudrate" readonly
                value="{{ $data['terminal_baudrate'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Tipo: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_type" readonly
                value="{{ $data['terminal_type'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Usuarios: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_users" readonly
                value="{{ $data['terminal_users'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">Huella Digital : </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_fingerprints" readonly
                value="{{ $data['terminal_fingerprints'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">punches: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_punches" readonly
                value="{{ $data['terminal_punches'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">faces: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_faces" readonly
                value="{{ $data['terminal_faces'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">zem: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_zem" readonly
                value="{{ $data['terminal_zem'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">kind: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_kind" readonly
                value="{{ $data['terminal_kind'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">IsSelect: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="IsSelect" readonly
                value="{{ $data['IsSelect'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">time checked: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_timechk" readonly
                value="{{ $data['terminal_timechk'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">last checked: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_lastchk" readonly
                value="{{ $data['terminal_lastchk'] }}" id="name">
        </div>
    </section>
@endsection


