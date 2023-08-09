<div class="chapter debug">

    {{-- <div class="bg-light p-3 rounded mb-3 debug">
        <p>RESULT data: {{ print_r($this->result) }}</p>

        <p>Current step in chapter: {{ $this->currentStepInChapter }}</p>
        <p>Count steps in chapter: {{ $this->getCountStepsInChapter() }}</p>
    </div> --}}

    @if (!$this->hasReactiveChapters())
        <p>{{ $this->getCurrentChapter() }}/{{ $this->getCountChapters() }}</p>
    @endif

    @if ($this->object->hasTitle())
        <h3 class="mb-4">{!! $this->object->getTitle() !!}</h3>
    @endif

    @if ($this->object->hasDescription())
        <p>{!! $this->object->getDescription() !!}</p>
    @endif

    @if ($object->hasConclusion() && $this->currentStepInChapter == $this->getCountStepsInChapter())
        <x-conclusion :$result :parent="$this->getMeta()" />

        <button class="btn btn-primary" wire:click="completeChapter" type="button">{!! __('actions.finish') !!}</button>
    @elseif(!$object->hasConclusion() && $this->currentStepInChapter == $this->getCountStepsInChapter())
        @php($this->completeChapter())
    @else
        @php($object = $this->object->getSchema()[$this->currentStepInChapter])
        <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($this->currentStepInChapter)" />
    @endif
</div>
