<div class="select-fieldtype fieldtype">
    <div class="form-group">
        <label class=" @if ($object->isRequired()) required @endif>" for="{{ $object->getName() }}">{{ $object->getLabel() }}</label>

        <select id="{{ $object->getName() }}" class="form-select" wire:model.live="value"
            @if ($object->isMultiple()) multiple @endif @if ($object->isRequired()) required @endif>

            @foreach ($object->getOptions() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
