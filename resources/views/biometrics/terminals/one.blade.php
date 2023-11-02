@extends('layouts.one')

@section('title')
    <h1 class="text-2xl font-semibold flex-1">{{ $data['terminal_name'] }}</h1>
@endsection


@section('inputs')
    <section class="w-5/6 md:w-2/3 xl:w-5/6 grid xl:grid-cols-2 gap-x-8 gap-y-8 mx-auto">
            <input type="hidden" name="terminal_id" readonly
                value="{{ $data['terminal_id'] }}" >
        
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal No: </label>
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
            <label class="w-32" for="name">Ubicacion del terminal: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_location" readonly
                value="{{ $data['terminal_location'] }}" id="name" >
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">tipo de conexion: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="termnal_conecttype" readonly
                value="{{ $data['termnal_conecttype'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal conectpwd: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_conectpwd" readonly
                value="{{ $data['terminal_conectpwd'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">nombre de dominio del terminal: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_domainname" readonly
                value="{{ $data['terminal_domainname'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal tcp/ip: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_tcpip" readonly
                value="{{ $data['terminal_tcpip'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal puerto: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_port" readonly
                value="{{ $data['terminal_port'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">serial del terminal: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_serial" readonly
                value="{{ $data['terminal_serial'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal baudrate: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_baudrate" readonly
                value="{{ $data['terminal_baudrate'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal tipo: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_type" readonly
                value="{{ $data['terminal_type'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal usuarios: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_users" readonly
                value="{{ $data['terminal_users'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">huella digital : </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_fingerprints" readonly
                value="{{ $data['terminal_fingerprints'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal punches: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_punches" readonly
                value="{{ $data['terminal_punches'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal faces: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_faces" readonly
                value="{{ $data['terminal_faces'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal zem: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_zem" readonly
                value="{{ $data['terminal_zem'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal_kind: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_kind" readonly
                value="{{ $data['terminal_kind'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">IsSelect: </label>
            <input type="number" step='' min='0' max='' class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="IsSelect" readonly
                value="{{ $data['IsSelect'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal_timechk: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_timechk" readonly
                value="{{ $data['terminal_timechk'] }}" id="name">
        </div>
        <div class="flex flex-row items-center gap-2 p-2">
            <label class="w-32" for="name">terminal_lastchk: </label>
            <input type="text" class="border-b-2 border-ldark cursor-default p-1 text-ldark flex-1" name="terminal_lastchk" readonly
                value="{{ $data['terminal_lastchk'] }}" id="name">
        </div>
    </section>
@endsection


