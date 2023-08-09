<div class="chapter debug">
    <div class="bg-light p-3 rounded mb-3 debug">
        <p>Result: {{ var_dump($this->result)}}</p>
        {{-- <p>{{dump(isset($this->result['company']) && $this->result['company'] == 'react' ? true : false)}}</p> --}}
        <p>Current step in chapter: {{ $this->currentStepInChapter }}</p>
        <p>Count steps in chapter: {{ $this->getCountStepsInChapter() }}</p>
    </div>

    <div class="
    @if ($this->parent['form']['hasStepCounters'] && $this->object->hasTitle()) d-flex justify-content-between
    @else d-block @endif">
        @if ($this->object->hasTitle())
            <h3 class="mb-4">{!! $this->object->getTitle() !!}</h3>
        @endif

        @if ($this->parent['form']['hasStepCounters'])
            <p class="counter">{{ $this->currentStepInChapter + 1 }}/{{ $this->getCountStepsInChapter() }}</p>
        @endif
    </div>

    @if ($this->object->hasDescription())
        <p>{!! $this->object->getDescription() !!}</p>
    @endif

    @if ($object->hasConclusion() && $this->currentStepInChapter == $this->getCountStepsInChapter())
        <x-conclusion :$result :parent="$this->getMeta()" />
    @else

        @php($object = $this->filteredSchema()[$this->currentStepInChapter])
        <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($this->currentStepInChapter)" />
    @endif
</div>
