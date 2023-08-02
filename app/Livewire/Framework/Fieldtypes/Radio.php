<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Radio as Input;
use App\Traits\Livewire\HasValue;

class Radio extends Component
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
