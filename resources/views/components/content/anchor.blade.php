<a href="{{ $object->isDispatchable ? "#" : $object->name }}" class="{{ $object->getClasses() }}"
    @if ($object->getTarget()) target="{{ $object->getTarget() }}" @endif
    @if ($object->getRel()) rel="{{ $object->getRel() }}" @endif
    @if ($object->isDispatchable()) wire:click="{{ $object->name }}" @endif>
    {{ $object->getLabel() }}
</a>
