<div class="row">
    @foreach ($object->getSchema() as $object)
        <livewire:is :component="$object->getView()" ::key="md5($loop - > index)" :$object />
    @endforeach
</div>
