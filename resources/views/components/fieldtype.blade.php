@if ($object->getReactive() || !$object->isReactive())
    <div class="fieldtype {{ $object->getClasses() }}">

        <div class="bg-light p-3 rounded mb-3 debug">
            Input name: {{ $object->name }}<br>
            Input rules: {{ $object->getRules() }}
        </div>

        <div class="form-group">
            <label for="{{ $object->name }}"
                class="form-label  @if ($object->isRequired()) required @endif>">{{ $object->getLabel() }}</label>

            <livewire:is :component="$object->getView()" :$key :$object :defaultValue="$result" />
        </div>
    </div>
@endif
