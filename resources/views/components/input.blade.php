<div>
    <div class="mb-1 border-b-2 border-b-ldark flex flex-row gap-2 items-center justify-around hover:border-b-primary">

        @if ($icon != '')
            <i class="fa-solid fa-lg {{ $icon }}" style="color: var(--color-dlight)"></i>
        @endif

        @if ($type == 'number')
            <input class="w-full h-10" name="{{ $name }}" type="{{ $type }}" min="{{ $min }}"
                step="{{ $step }}" max="{{ $max }}" placeholder="{{ $placeholder }}"
                value="{{ old($name) }}">
        @else
            @if ($type == 'date' || $type == 'time' || $type == 'datetime-local')
                @if ($type == 'date')
                    <input class="w-full h-10" name="{{ $name }}" type="{{ $type }}"
                        value="{{ old($name) }}">
                @else
                    <input class="w-full h-10" name="{{ $name }}" type="{{ $type }}" step="1"
                        value="{{ old($name) }}">
                @endif
            @else
                if
                <input class="w-full h-10" id="{{ $id }}" autocomplete="{{ $autocomplete }}"
                    name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
                    value="{{ old($name) }}">

                @if ($type == 'password')
                    <button type="button" id="{{ $id . 'preview' }}">
                        <i class="fa-solid fa-lg fa-eye" style="color: var(--color-dlight)"></i>
                    </button>
                    <script>
                        document.getElementById(`${@json($id)}preview`).addEventListener("click", function() {
                            if (document.getElementById(@json($id)).type === "password") {
                                document.getElementById(@json($id)).type = "text";
                            } else {
                                document.getElementById(@json($id)).type = "password";
                            }
                        });
                    </script>
                @endif
            @endif
        @endif

    </div>

    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
