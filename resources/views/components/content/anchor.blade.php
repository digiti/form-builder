@if ($object->isDispatchable())
    <button class="{{ $object->getClasses() }}" wire:click="{{ $object->name }}" type="button"
        @if (!empty($this->parent['form']['hasErrors'])) disabled @endif>
        {{-- <div wire:loading.delay.longest.remove> --}}
            {{ $object->getLabel() }}
        {{-- </div> --}}

        {{-- <div wire:loading.delay.longest>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> --}}
    </button>
@else
    <a href="{{ $object->name }}" class="{{ $object->getClasses() }}"
        @if ($object->getTarget()) target="{{ $object->getTarget() }}" @endif
        @if ($object->getRel()) rel="{{ $object->getRel() }}" @endif> {{ $object->getLabel() }} </a>
@endif
