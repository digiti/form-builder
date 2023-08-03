<div>
    <p>defaultValue text input: {{var_dump($defaultValue)}}</p>
    <input id="{{ $object->getName() }}" class="form-control" type="{{ $object->getType() }}" wire:model.live="value"
            @if ($object->isRequired()) required @endif>
</div>
