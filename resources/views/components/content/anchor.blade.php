@if ($object->isDispatchable())
    <button class="{{ $object->getClasses() }}" wire:click="{{ $object->name }}" type="button">
        {{ $object->getLabel() }}
    </button>
@else
    <a href="{{ $object->name }}" class="{{ $object->getClasses() }}"
        @if ($object->getTarget()) target="{{ $object->getTarget() }}" @endif
        @if ($object->getRel()) rel="{{ $object->getRel() }}" @endif> {{ $object->getLabel() }} </a>
@endif
