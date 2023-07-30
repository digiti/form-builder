<div>
    Parent data: {{ print_r($this->parent) }}
    Current Step: {{ $this->getCurrentStep() }}

    <h3>{!! $this->object->getTitle() !!}</h3>
    <p>{!! $this->object->getDescription() !!}</p>

    @foreach ($this->object->getSchema() as $object)
        <livewire:is :component="$object->getView()" :$object :key="md5($loop->index)" />
    @endforeach

    @if($this->getCurrentStep() > 1)
        <button class="btn btn-primary" wire:click="previousStep">Previous step</button>
    @endif

    @if($this->getCountSteps() !== $this->getCurrentStep())
        <button class="btn btn-primary" wire:click="nextStep">Next step</button>
    @endif
</div>
