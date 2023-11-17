@if ($object->isDispatchable())
    <button class="{{ $object->getClasses() }}" wire:click="{{ $object->name }}" type="button"
        @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
        {{ $object->getLabel() }}
    </button>
@else
    <a href="{{ $object->name }}" class="{{ $object->getClasses() }}"
        @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif
        @if ($object->getTarget()) target="{{ $object->getTarget() }}" @endif
        @if ($object->getRel()) rel="{{ $object->getRel() }}" @endif> {{ $object->getLabel() }} </a>
@endif
