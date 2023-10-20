<div>
    <select class="w-full h-10" id="estado" name="estado">
        <option value="">-- Selecciona Uno --</option>
        <option value="1">Aguascalientes</option>
        <option value="2">Baja California</option>
        <option value="3">Baja California Sur</option>
        <option value="4">Campeche</option>
        <option value="5">Chiapas</option>
        <option value="6">Chihuahua</option>
        <option value="7">Ciudad de México</option>
        <option value="8">Coahuila</option>
        <option value="9">Colima</option>
        <option value="10">Durango</option>
        <option value="11">Estado de México</option>
        <option value="12">Guanajuato</option>
        <option value="13">Guerrero</option>
        <option value="14">Hidalgo</option>
        <option value="15">Jalisco</option>
        <option value="16">Michoacán</option>
        <option value="17">Morelos</option>
        <option value="18">Nayarit</option>
        <option value="19">Nuevo León</option>
        <option value="20">Oaxaca</option>
        <option value="21">Puebla</option>
        <option value="22">Querétaro</option>
        <option value="23">Quintana Roo</option>
        <option value="24">San Luis Potosí</option>
        <option value="25">Sinaloa</option>
        <option value="26">Sonora</option>
        <option value="27">Tabasco</option>
        <option value="28">Tamaulipas</option>
        <option value="29">Tlaxcala</option>
        <option value="30">Veracruz</option>
        <option value="31">Yucatán</option>
        <option value="32">Zacatecas</option>
    </select>

    @if ($errors->has('estado'))
        <span class="text-danger">{{ $errors->first('estado') }}</span>
    @endif
</div>
