{{-- TODO: This might be redundant and may be removed if tested --}}
{{-- <div class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
    @foreach ($object->getSchema() as $object)
        <x-dynamic-component :component="$object->getView()" :key="md5($loop->index)" :$object :$result />
    @endforeach
</div> --}}
