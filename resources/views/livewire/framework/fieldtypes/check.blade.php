<div class="check-fieldtype fieldtype">
    <div class="form-group">
        @if ($object->getOptions())
            <p class="label">{{ $object->getLabel() }}</p>

            @foreach ($object->getOptions() as $key => $value)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model.live="value" value="{{ $key }}"
                        id="{{ $key }}">
                    <label class="form-check-label" for="{{ $key }}">
                        {{ $value }}
                    </label>
                </div>
            @endforeach
        @else
            <input class="form-check-input" type="checkbox" wire:model.live="value" id="{{ $object->getName() }}">
            <label class="form-check-label" for="{{ $object->getName() }}">
                {{ $object->getLabel() }}
            </label>
        @endif
    </div>
</div>
