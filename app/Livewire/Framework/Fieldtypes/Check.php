<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Check as Input;
use App\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Check extends Component
{
    use HasValue;

    #[Reactive]
    public Input $object;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->name] ?? [];
    }

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
