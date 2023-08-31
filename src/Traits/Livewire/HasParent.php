<?php

namespace Digiti\FormBuilder\Traits\Livewire;

use Livewire\Attributes\Reactive;

trait HasParent
{
    #[Reactive]
    public array $parent;

    public function getParent(): array
    {
        return $this->parent;
    }
}
