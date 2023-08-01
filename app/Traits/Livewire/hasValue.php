<?php

namespace App\Traits\Livewire;

trait HasValue
{
    public mixed $value;

    public function updatedValue()
    {
        $this->dispatch(
            'input-updated',
            name: $this->object->getName(),
            value: $this->value
        );
    }
}
