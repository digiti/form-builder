<div
    @class([
        'chapter',
        'debug' => $object->hasDebug()
    ])
>

    @if($object->hasDebug())
        <div class="bg-light p-3 rounded mb-3 debug">
            <p>Result: {{ var_dump($result) }}</p>
            <p>Current step in chapter: {{ $currentStepInChapter }}</p>
            <p>Count steps in chapter: {{ $this->getCountStepsInChapter() }}</p>
        </div>
    @endif

    <div class="
    @if ($this->parent['form']['hasStepCounters'] && $object->hasTitle()) d-flex justify-content-between
    @else d-block @endif
    ">
        @if ($this->object->hasTitle())
            <h3 class="mb-4">{!! $object->getTitle() !!}</h3>
        @endif

        @if ($parent['form']['hasStepCounters'] && !($object->hasConclusion() && $currentStepInChapter == $this->getCountStepsInChapter()))
            <p class="counter">{{ $currentStepInChapter + 1 }}/{{ $this->getCountStepsInChapter() }}</p>
        @endif
    </div>

    @if ($object->hasDescription())
        <p>{!! $this->object->getDescription() !!}</p>
    @endif

    @if ($object->hasConclusion() && $currentStepInChapter == $this->getCountStepsInChapter())
        <x-conclusion :$result :parent="$this->getMeta()" />

        <button class="btn btn-primary" wire:click="previousStepInChapter" type="button">
            {!! __('actions.previous_step') !!}
        </button>
        <button class="btn btn-primary" wire:click="$dispatch('chapter-complete')" type="button" @if(!empty($parent['form']['hasErrors'])) disabled @endif>
            {!! __('actions.next_step') !!}
        </button>
    @else
        @php($object = $this->filteredSchema()[$currentStepInChapter])
        <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($currentStepInChapter)" />
    @endif
</div>
