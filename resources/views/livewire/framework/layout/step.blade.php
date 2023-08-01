<div>
    Parent data: {{ print_r($this->parent) }}
    Current Step: {{ $this->getCurrentStep() }}

    @if($this->object->hasTitle())
        <h3>{!! $this->object->getTitle() !!}</h3>
    @endif

    @if($this->object->hasDescription())
        <p>{!! $this->object->getDescription() !!}</p>
    @endif

    @foreach ($this->object->getSchema() as $object)
        <livewire:is :component="$object->getView()" :$object :key="md5($loop->index)" />
    @endforeach

    @if($this->getCurrentStep() > 1)
        <button class="btn btn-primary" wire:click="previousStep" type="button" >Previous step</button>
    @endif

    @if($this->getCountSteps() !== $this->getCurrentStep())
        <button class="btn btn-primary" wire:click="nextStep" type="button" >Next step</button>
    @endif
</div>
