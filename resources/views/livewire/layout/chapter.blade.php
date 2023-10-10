<div
    @class([
        'chapter',
        'debug' => $object->hasDebug()
    ])
>

    @if($object->hasDebug())
        <div class="bg-light p-3 rounded mb-3 debug">
            <p>Result: {{ var_dump($result) }}</p>
            <p>Current step in chapter: {{ $parent['form']['currentSubItem'] }}</p>
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

        @if ($parent['form']['hasStepCounters'] && !($object->hasConclusion() && $parent['form']['currentSubItem'] == $this->getCountStepsInChapter()))
            <p class="counter">{{ $parent['form']['currentSubItem'] + 1 }}/{{ $this->getCountStepsInChapter() }}</p>
        @endif
    </div>

    @if ($object->hasDescription())
        <p>{!! $this->object->getDescription() !!}</p>
    @endif

    @if ($object->hasConclusion() && $parent['form']['currentSubItem'] == $this->getCountStepsInChapter())
        <x-form-builder::conclusion :$result :parent="$this->getMeta()" />

        <button class="btn btn-primary" wire:click="previousStep" type="button">
            {!! __('form-builder::actions.previous_step') !!}
        </button>

        <button class="btn btn-primary" wire:click="nextStep" type="button" @if(!empty($parent['form']['hasErrors'])) disabled @endif>
            @if($this->showSubmit()) {!! __('form-builder::actions.submit') !!} @else {!! __('form-builder::actions.next_step') !!} @endif
        </button>
    @else
        @php($object = $this->filteredSchema()[$parent['form']['currentSubItem']])
        <livewire:is :component="$object->getView()" :$object :$result :parent="$this->getMeta()" :key="md5($parent['form']['currentSubItem'])" />
    @endif
</div>
