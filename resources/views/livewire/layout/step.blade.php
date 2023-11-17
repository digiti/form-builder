<div @class([
    'step position-relative',
    'debug' => $object->hasDebug(),
    'no-controls' => !$object->hasControls(),
    $object->getClasses() ?? '',
])>

    @php($showControls = $object->hasControls())

    @if ($object->hasDebug())
        <div class="bg-light p-3 rounded mb-3 debug">
            <p>Parent data: {{ var_dump($parent) }}</p>
            <p>RESULT data: {{ var_dump($result) }}</p>

            <p>Current Step in schema: {{ $this->getCurrentSchemaItem() }}</p>
            <p>Count Step in schema: {{ $this->getCountSchemaItems() }}</p>

            <p>Current Step: {{ $this->getCurrentStep() }}</p>
            <p>Count Step: {{ $this->getCountSteps() }}</p>
        </div>
    @endif

    @if ($object->hasTitle())
        <h3 class="mb-4">{!! $object->getTitle() !!}</h3>
    @endif

    @if ($object->hasDescription())
        <p>{!! $object->getDescription() !!}</p>
    @endif

    @foreach ($object->filteredSchema() as $object)
        <x-dynamic-component :component="$object->getView()" :key="md5($loop->index)" :$object :$result />
    @endforeach

    @if ($showControls)
        @if ($this->parent['form']['currentItem'] > 0 || $this->parent['form']['currentSubItem'])
            <button class="btn btn-primary" wire:click="previousStep" type="button">
                {!! __('form-builder::actions.previous_step') !!}
            </button>
        @endif

        {{-- @if ($this->getCountSteps() > $this->getCurrentStep()) --}}
        <button class="btn btn-primary" wire:click='$dispatch("validate-inputs", {progress:true})' type="button"
            {{-- @if (!empty($parent['form']['hasErrors'])) disabled @endif> --}}
            @if ($this->showSubmit())
                {!! __('form-builder::actions.submit') !!}
            @else
                {!! __('form-builder::actions.next_step') !!}
            @endif
        </button>
        {{-- @endif --}}

    @endif
</div>
