<div @class([
    'step',
    'debug' => $object->hasDebug()
])>

    @if($object->hasDebug())
        <div class="bg-light p-3 rounded mb-3 debug">
            <p>Parent data: {{ var_dump($parent) }}</p>
            <p>RESULT data: {{ var_dump($result) }}</p>

            <p>Current Step in schema: {{ $this->getCurrentSchemaItem() }}</p>
            <p>Count Step in schema: {{ $this->getCountSchemaItems() }}</p>

            <p>Current Step: {{ $this->getCurrentStep() }}</p>
            <p>Count Step: {{ $this->getCountSteps() }}</p>
        </div>
    @endif

    {{ time() }}

    @if ($object->hasTitle())
        <h3 class="mb-4">{!! $object->getTitle() !!}</h3>
    @endif

    @if ($object->hasDescription())
        <p>{!! $object->getDescription() !!}</p>
    @endif

    @foreach ($object->getSchema() as $object)
        <livewire:framework.layout.fieldtype :key="md5($loop->index)" :$object :$result />
    @endforeach

    @if ($this->getCurrentStep() > 0 || $this->getCurrentSchemaItem() > 0)
        <button class="btn btn-primary" wire:click="previousStep" type="button">{!! __('actions.previous_step') !!}</button>
    @endif

    @if ($this->getCountSteps() > $this->getCurrentStep())
        <button class="btn btn-primary" wire:click="nextStep" type="button">{!! __('actions.next_step') !!}</button>
    @endif
</div>
