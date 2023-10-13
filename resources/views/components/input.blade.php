<div>
    <div class="mb-1 border-b-2 border-b-ldark flex flex-row gap-2 items-center justify-around">

        @if ($icon != '')
            <i class="fa-solid fa-lg {{ $icon }}" style="color: var(--color-dlight)"></i>
        @endif

        <input class="w-full h-10" id="{{ $id }}" autocomplete="{{ $autocomplete }}" name="{{ $name }}"
            type="{{ $type }}" placeholder="{{ $placeholder }}">

        @if ($needsUnhidden == 'yes')
            <button type="button" id="{{ $id . 'preview' }}">
                <i class="fa-solid fa-lg fa-eye" style="color: var(--color-dlight)"></i>
            </button>
        @endif
    </div>

    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>

<script>
    if (@json($needsUnhidden)) {
        document.getElementById(`${@json($id)}preview`).addEventListener("click", function() {
            if (document.getElementById(@json($id)).type === "password") {
                document.getElementById(@json($id)).type = "text";
            } else {
                document.getElementById(@json($id)).type = "password";
            }
        });
    }
</script>
