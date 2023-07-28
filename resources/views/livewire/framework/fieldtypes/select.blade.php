<div>
    <select wire:model.live="value" @if($input->isMultiple()) multiple @endif>
        {{-- <option disabled>Select a option...</option> --}}

        @foreach($input->getOptions() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
