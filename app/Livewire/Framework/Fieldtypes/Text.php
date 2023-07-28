<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Fieldtypes\Text as Input;
use App\Traits\Livewire\HasValue;

class Text extends Component
{
    use HasValue;

    public Input $input;

    public function render()
    {
        return view('livewire.'.$this->input->getField());
    }
}
