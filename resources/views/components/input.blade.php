<div>
    <div class="mb-1 border-2 p-2 rounded-lg border-slate-300 flex flex-row gap-2 items-center justify-around">

        @if ($icon != '')
            <i class="fa-solid fa-lg {{ $icon }}"></i>
        @endif

        <input class="w-full" autocomplete="{{ $autocomplete }}" name="{{ $name }}" type="{{ $type }}"
            placeholder="{{ $placeholder }}">

        @if ($needsUnhidden == 'yes')
            <button type="button" id="preview">
                <i class="fa-solid fa-lg fa-eye"></i>
            </button>
        @endif
    </div>

    @if ($errors->has($name))
        <span class="text-red-700">{{ $errors->first($name) }}</span>
    @endif
</div>
