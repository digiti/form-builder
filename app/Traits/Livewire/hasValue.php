<?php

namespace App\Traits\Livewire;

trait HasValue
{
    public mixed $value;
    public array | null $result;

    public function mount()
    {
        $this->value = $this->result[$this->object->getName()] ?? null;
    }

    public function updatedValue()
    {
        $this->dispatch(
            'input-updated',
            name: $this->object->getName(),
            value: $this->value
        );
    }
}
