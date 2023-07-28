<div class="form-group">
    <label for="{{ $input->getName() }}">{{ $input->getLabel() }}</label>

    <select id="{{ $input->getName() }}" class="form-select" wire:model.live="value"
        @if ($input->isMultiple()) multiple @endif @if ($input->isRequired()) required @endif>

        @foreach ($input->getOptions() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
