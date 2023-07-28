<div>
    <div class="mb-3">
        This is the base form

        result:
        {{ print_r($result) }}

    </div>

    <form class="form" wire:submit.prevent="saveForm">
        @foreach ($this->schema() as $input)
            <livewire:is :component="$input->getField()" :$input :key="md5($loop->index)" />
        @endforeach

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
