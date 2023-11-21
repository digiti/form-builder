<div class="{{ $object->getClasses() }}" @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>
    @if ($object->getGlide())
        @php($glideParams = ['src' => $object->name, 'format' => 'webp'])

        @if ($object->getWidth())
            @php($glideParams['width'] = $object->getWidth())
        @endif

        @if ($object->getHeight())
            @php($glideParams['height'] = $object->getHeight())
        @endif

        <img src="@glide($glideParams)" alt="{{ $object->alt ?? null }}" class="glide">
    @else
        <img src="{{ $object->name }}" alt="{{ $object->getAlt() }}">
    @endif
</div>
