<div class="{{ $object->getClasses() }}">
    @foreach ($object->getSchema() as $object)
        @if ($this->isImage($object))
            <x-content.image :$object />
        @else
            <livewire:is :component="$object->getView()" ::key="md5($loop - > index)" :$object />
        @endif
    @endforeach
</div>
