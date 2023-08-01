<div>
    <div class="mb-3">
        This is the base form<br>

        Result: {{ print_r($result) }} <br>
        Current Step: {{ $this->currentStep }}<br>
        Step count: {{ $this->countSteps() }}<br>
    </div>

    <form class="form" wire:submit="saveForm">
        @if ($this->hasSteps())
            @php($object = $this->schema()[$this->currentStep])
            <livewire:is :component="$object->getView()" :$object :parent="$this->getMeta()" :key="md5($this->currentStep)" />
        @else
            @foreach ($this->schema() as $object)
                <livewire:is :component="$object->getView()" :$object :key="md5($loop->index)" />
            @endforeach

            <button class="btn btn-primary" type="submit">Submit</button>
        @endif
    </form>
</div>
