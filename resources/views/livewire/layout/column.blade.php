<div>
    @if ($object->hasDebug())
        <div class="bg-light p-3 rounded mb-3 debug">
            <p>Parent data: {{ var_dump($parent) }}</p>
            <p>RESULT data: {{ var_dump($result) }}</p>

            {{-- <p>Current Step in schema: {{ $this->getCurrentSchemaItem() }}</p>
            <p>Count Step in schema: {{ $this->getCountSchemaItems() }}</p> --}}

            {{-- <p>Current Step: {{ $this->getCurrentStep() }}</p>
            <p>Count Step: {{ $this->getCountSteps() }}</p> --}}
        </div>
    @endif

    @foreach ($object->filteredSchema() as $object)
        <x-dynamic-component :component="$object->getView()" :key="md5($loop->index)" :$object :$result />
    @endforeach
</div>
