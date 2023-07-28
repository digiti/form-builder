<div>
    This is the base form

    result:
    {{ print_r($result) }}

    @foreach($this->schema() as $input)
        <livewire:is :component="$input->getField()" :$input :key="md5($loop->index)" />
    @endforeach
</div>
