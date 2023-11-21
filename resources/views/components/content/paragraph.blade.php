<div class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
    <p>{!! $object->name !!}</p>
</div>
