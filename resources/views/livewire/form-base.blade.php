<div
    @class([
        'form-base',
        'debug' => $debug
    ])
>
    @if ($debug)
        <div class="mb-3 bg-light p-3 rounded mt-5">
            <p>Result: {{ var_dump($result) }}</p>
            <p>Current item: {{ $currentItem }}</p>
            <p>Current subitem: {{ $currentSubItem }}</p>
            <p>schema item count: {{ $this->countSchemaItems() }}</p>
            <p>Errors: {{ var_dump($this->hasErrors) }}</p>
            <p>Progress counter: {{ var_dump($this->progress) }}</p>
        </div>
    @endif

    <div class="form-wrapper">
        <form class="form" wire:submit="submit">
            @if ($hasConclusion && $currentItem == $this->countSchemaItems())
                <x-fb::conclusion :$result :parent="$this->getMeta()" />
            @else
                @if ($hasStepCounters)
                    <p>{{ $currentItem + 1 }}/{{ $this->countSchemaItems() }}</p>
                @endif

                @php($object = $this->getCurrentSchemaObject())
                <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($currentItem)" />
            @endif
        </form>
    </div>
</div>
