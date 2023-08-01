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
        if (count($this->object->getOptions()) > 0) {
            $this->value = [];
        }
    }

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
