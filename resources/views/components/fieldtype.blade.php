@if ($object->getReactive() || !$object->isReactive())
    <div class="fieldtype {{ $object->getClasses() }}"
        @if ($object->getId() ?? null) id="{{ $object->getId() }}" @endif>

        @if ($object->hasDebug())
            <div class="bg-light p-3 rounded mb-3 debug">
                Input name: {{ $object->name }}<br>
                Input rules: {{ $object->getRules() }}<br>
                Results: {{ var_dump($defaultValue) }}
            </div>
        @endif
        <div class="form-group">
            @if ($object->showLabel() ?? true)
                <label for="{{ $object->name }}"
                    class="form-label  @if ($object->isRequired()) required @endif>">{{ $object->getLabel() }}</label>
            @endif
            <livewire:is :component="$object->getView(true)" :$key :$object :defaultValue="$result" />

            <livewire:form-builder::livewire.layout.fieldtype-error :$object :key="md5($key)" />
        </div>
    </div>
@endif
