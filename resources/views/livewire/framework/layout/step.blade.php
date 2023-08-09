<div class="step debug">
    @if ($this->object->hasTitle())
        <h3 class="mb-4">{!! $this->object->getTitle() !!}</h3>
    @endif

    @if ($this->object->hasDescription())
        <p>{!! $this->object->getDescription() !!}</p>
    @endif

    @foreach ($this->object->getSchema() as $object)
        <x-fieldtype :key="md5($loop->index)" :$object :$result />
    @endforeach

    @if ($this->getCurrentStep() > 0)
        <button class="btn btn-primary" wire:click="previousStep" type="button">{!! __('actions.previous_step') !!}</button>
    @endif

    @if ($this->getCountSteps() > $this->getCurrentStep())
        <button class="btn btn-primary" wire:click="nextStep" type="button">{!! __('actions.next_step') !!}</button>
    @endif
</div>
