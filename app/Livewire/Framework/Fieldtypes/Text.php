<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Text as Input;
use App\Traits\Livewire\HasValue;

class Text extends Component
{
    use HasValue;

    public Input $object;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->getName()] ?? null;
    }

    public function render()
    {
        return view('livewire.'.$this->object->getView());
    }
}
