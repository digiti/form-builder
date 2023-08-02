<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Range as Input;
use App\Traits\Livewire\HasValue;

class Range extends Component
{
    use HasValue;

    public Input $object;

    public function mount()
    {
            $this->value = $this->result[$this->object->getName()] ?? ($this->object->getMax() - $this->object->getMin())/2;
    }

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
