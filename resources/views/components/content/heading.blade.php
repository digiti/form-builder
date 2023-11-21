@switch($object->getLevel())
    @case(1)
        <h1 class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
            {!! $object->name !!}
        </h1>
    @break

    @case(2)
        <h2 class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
            {!! $object->name !!}
        </h2>
    @break

    @case(3)
        <h3 class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
            {!! $object->name !!}
        </h3>
    @break

    @case(4)
        <h4 class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
            {!! $object->name !!}
        </h4>
    @break

    @case(5)
        <h5 class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
            {!! $object->name !!}
        </h5>
    @break

    @default
        <p class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
            {!! $object->name !!}
        </p>
@endswitch
