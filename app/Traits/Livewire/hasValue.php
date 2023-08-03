<?php

namespace App\Traits\Livewire;

use Livewire\Attributes\Reactive;

trait HasValue
{
    public mixed $value;

    #[Reactive]
    public mixed $defaultValue = null;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->getName()] ?? null;
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
