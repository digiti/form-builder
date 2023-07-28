<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Fieldtypes\Select as Input;
use App\Traits\Livewire\HasValue;

class Select extends Component
{
    use HasValue;

    public Input $input;

    public function render()
    {
        return view('livewire.'.$this->input->getField());
    }
}
