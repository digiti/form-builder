<?php

namespace App\Traits\Livewire;

trait HasValue
{
    public $value;

    public function updatedValue()
    {
        $this->dispatch(
            'input-updated',
            name: $this->object->getName(),
            value: $this->value
        );
    }
}
