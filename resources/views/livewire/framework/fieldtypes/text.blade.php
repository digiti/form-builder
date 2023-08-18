<div>
    <input id="{{ $object->name }}" class="form-control" type="{{ $object->getType() }}" wire:model.live.debounce.350ms="value"
        @if ($object->isRequired()) required @endif>
</div>
