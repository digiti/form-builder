<div class="{{ $object->getClasses() }}">
    @foreach ($object->getSchema() as $object)
        @if ($this->isImage($object))
            <x-form-builder::content.image :$object />
        @elseif ($this->isParagraph($object))
            <x-form-builder::content.paragraph :$object />
        @elseif ($this->isHeading($object))
            <x-form-builder::content.heading :$object />
        @elseif ($this->isHtml($object))
            <x-form-builder::content.html :$object />
        @elseif ($this->isAnchor($object))
            <x-form-builder::content.anchor :$object />
        @else
            {{-- <livewire:is :component="$object->getView()" :key="md5($loop->index)" :$object /> --}}
                <x-form-builder::fieldtype :$object :$result />
        @endif
    @endforeach
</div>
