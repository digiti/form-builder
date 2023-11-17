<div>
    <div class="d-flex">
        <div class="w-100">
            <p class="range-value text-center font-weiht-bold">
                {!! $object->getPrefix() ?? null !!}{{ $value }}{!! $object->getSuffix() ?? null !!}</p>
            <input type="range" class="form-range" id="{{ $object->name }}" wire:model.live="value"
                min="{{ $object->getMin() }}" max="{{ $object->getMax() }}" step="{{ $object->getStep() }}"
                @if ($object->isRequired()) required @endif>

            <div class="d-flex justify-content-between">
                <p class="range-min text-muted small">
                    {!! $object->getPrefixForMin() ?? null !!}{!! $object->getPrefix() ?? null !!}{{ $object->getMin() }}{!! $object->getSuffix() ?? null !!}{!! $object->getSuffixForMin() ?? null !!}
                </p>
                <p class="range-max text-muted small">
                    {!! $object->getPrefixForMax() ?? null !!}{!! $object->getPrefix() ?? null !!}{{ $object->getMax() }}{!! $object->getSuffix() ?? null !!}{!! $object->getSuffixForMax() ?? null !!}
                </p>
            </div>
        </div>
    </div>
</div>
