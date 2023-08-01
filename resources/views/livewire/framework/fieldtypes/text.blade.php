<div class="text-fieldtype fieldtype">
    <div class="form-group">
        <label class=" @if ($object->isRequired()) required @endif>" for="{{ $object->getName() }}">{{ $object->getLabel() }}</label>

        <input id="{{ $object->getName() }}" class="form-control" type="{{ $object->getType() }}" wire:model.live="value"
            @if ($object->isRequired()) required @endif>
    </div>
</div>
