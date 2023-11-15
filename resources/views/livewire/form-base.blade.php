<div @class([
    'form-base',
    'debug' => $debug,
    'form-' . strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $name)),
])>
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
        <div wire:loading.block>
            <div class="loading">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <form class="form" wire:submit="submit">
            <div class="form-body" wire:loading.class="form-loading-opacity-40">
                @if ($hasConclusion && $currentItem == $this->countSchemaItems())
                    <x-form-builder::conclusion :$result :parent="$this->getMeta()" />
                @else
                    @if ($hasStepCounters)
                        <p>{{ $currentItem + 1 }}/{{ $this->countSchemaItems() }}</p>
                    @endif

                    @php($object = $this->getCurrentSchemaObject())
                    <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($currentItem)" />
                @endif
            </div>
        </form>
    </div>
</div>
