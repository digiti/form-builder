<div class="{{ $object->getClasses() }}">
    @foreach ($object->getSchema() as $object)
        <x-dynamic-component :component="$object->getView()" :key="md5($loop->index)" :$object :$result />
    @endforeach
</div>
