<div class="{{ $object->getClasses() }}">
    @switch($object->getLevel())
        @case(1)
            <h1>{!! $object->name !!}</h1>
        @break

        @case(2)
            <h2>{!! $object->name !!}</h2>
        @break

        @case(3)
            <h3>{!! $object->name !!}</h3>
        @break

        @case(4)
            <h4>{!! $object->name !!}</h4>
        @break

        @case(5)
            <h5>{!! $object->name !!}</h5>
        @break

        @default
            <p>{!! $object->name !!}}</p>
    @endswitch
</div>
