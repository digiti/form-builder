<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Check as Input;
use App\Traits\Livewire\HasValue;

class Check extends Component
{
    use HasValue;

    public Input $object;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->getName()] ?? [];
    }

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
