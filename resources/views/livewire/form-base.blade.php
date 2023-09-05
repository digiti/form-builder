<div
    @class([
        'form-base',
        'debug' => $debug
    ])
>
    @if ($debug)
        <div class="mb-3 bg-light p-3 rounded mt-5">
            <p>Result: {{ var_dump($result) }}</p>
            <p>Current schema item: {{ $currentSchemaItem }}</p>
            <p>schema item count: {{ $this->countSchemaItems() }}</p>
            <p>Errors: {{ var_dump($this->hasErrors) }}</p>
        </div>
    @endif

    <div class="form-wrapper">
        <form class="form" wire:submit="submit">
            @if ($hasConclusion && $currentSchemaItem == $this->countSchemaItems())
                <x-fb::conclusion :$result :parent="$this->getMeta()" />
            @else
                @if ($hasStepCounters)
                    <p>{{ $currentSchemaItem + 1 }}/{{ $this->countSchemaItems() }}</p>
                @endif

                @php($object = $this->filteredSchema()[$this->currentSchemaItem])
                <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($currentSchemaItem)" />
            @endif
        </form>
    </div>
</div>
