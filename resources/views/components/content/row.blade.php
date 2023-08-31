<div class="{{ $object->getClasses() }}">
    @foreach ($object->getSchema() as $object)
        @if ($this->isColumn($object))
        <x-content.column :$object />
        @else
            <livewire:is :component="$object->getView()" ::key="md5($loop - > index)" :$object />
        @endif
    @endforeach
</div>
