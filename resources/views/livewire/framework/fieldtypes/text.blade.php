<div>
    <input id="{{ $object->name }}" class="form-control" type="{{ $object->getType() }}" wire:model.live="value"
        @if ($object->isRequired()) required @endif>
</div>
