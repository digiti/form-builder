<div>
    <div class="d-flex">
        <p class="range-min">{{ $object->getMin() }}</p>

        <input type="range" class="form-range mx-3" id="{{ $object->getName() }}" wire:model.live="value"
            min="{{ $object->getMin() }}" max="{{ $object->getMax() }}" step="{{ $object->getStep() }}"
            @if ($object->isRequired()) required @endif>

        <p class="range-max">{{ $object->getMax() }}</p>
    </div>
    <p class="range-value text-center">{{ $value }}</p>
</div>
