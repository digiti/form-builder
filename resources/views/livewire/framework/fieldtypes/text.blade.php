<div class="form-group">
    <label for="{{ $input->getName() }}">{{ $input->getLabel() }}</label>

    <input id="{{ $input->getName() }}" class="form-control" type="{{ $input->getType() }}" wire:model.live="value"
        @if ($input->isRequired()) required @endif>
</div>
