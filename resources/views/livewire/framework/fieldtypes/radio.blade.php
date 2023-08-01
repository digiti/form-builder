<div class="radio-fieldtype fieldtype">
    <div class="form-group">
        <p class="label">{{ $object->getLabel() }}</p>

        @foreach ($object->getOptions() as $key => $value)
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model.live="value" value="{{ $key }}"
                    id="{{ $key }}">
                <label class="form-check-label" for="{{ $key }}">{{ $value }}</label>
            </div>
        @endforeach
    </div>
</div>
