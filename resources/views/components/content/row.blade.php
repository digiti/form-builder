<div class="{{ $object->getClasses() }}">
    @foreach ($object->getSchema() as $object)
        @if ($this->isColumn($object))
        <x-content.column :$object :$result />
        @else
            {{-- <livewire:is :component="$object->getView()" :key="md5($loop->index)" :$object /> --}}
                <x-fieldtype :key="md5($loop->index)" :$object :$result />
        @endif
    @endforeach
</div>
