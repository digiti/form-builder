<div>
    <div class="fieldtype {{ $object->getClasses() }}">

        @if($object->hasDebug())
            <div class="bg-light p-3 rounded mb-3 debug">
                Input name: {{ $object->name }}<br>
                Input rules: {{ $object->getRules() }}<br>
                Results: {{ var_dump($defaultValue) }}
            </div>
        @endif

        <div class="form-group">
            <label for="{{ $object->name }}"
                class="form-label  @if ($object->isRequired()) required @endif>">{{ $object->getLabel() }}</label>

            <livewire:is :component="$object->getView()" :$key :$object :defaultValue="$result"/>

            <livewire:layout.fieldtype-error :$object />
        </div>
    </div>
</div>
