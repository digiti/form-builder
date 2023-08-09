<div class="form-base">
    <div class="mb-3 bg-light p-3 rounded mt-5">
        <p>Current schema item: {{ $this->currentSchemaItem }}</p>
        <p>schema item count: {{ $this->countSchemaItems() }}</p>
    </div>

    <div class="form-wrapper">
        <form class="form" wire:submit="saveForm">
            @if ($this->hasConclusion && $this->currentSchemaItem == $this->countSchemaItems())
                <x-conclusion :$result :parent="$this->getMeta()" />
            @else
                @if ($this->hasStepCounters)
                    <p>{{ $this->currentSchemaItem + 1 }}/{{ $this->countSchemaItems() }}</p>
                @endif

                @php($object = $this->filteredSchema()[$this->currentSchemaItem])
                <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($this->currentSchemaItem)" />
            @endif
        </form>
    </div>
</div>
