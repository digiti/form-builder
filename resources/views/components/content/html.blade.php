<div class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
    {!! $object->name !!}
</div>
