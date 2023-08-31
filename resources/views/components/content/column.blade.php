<div class="{{ $object->getClasses() }}">
    @foreach ($object->getSchema() as $object)
        @if ($this->isImage($object))
            <x-content.image :$object />
        @elseif ($this->isParagraph($object))
            <x-content.paragraph :$object />
        @elseif ($this->isHeading($object))
            <x-content.heading :$object />
        @elseif ($this->isHtml($object))
            <x-content.html :$object />
        @elseif ($this->isAnchor($object))
            <x-content.anchor :$object />
        @else
            {{-- <livewire:is :component="$object->getView()" :key="md5($loop->index)" :$object /> --}}
                <x-fieldtype :$object :$result />
        @endif
    @endforeach
</div>
