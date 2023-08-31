<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Select as Input;
use App\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Select extends Component
{
    use HasValue;

    #[Reactive]
    public Input $object;

    public function render()
    {
        return view('livewire.'.$this->object->getView());
    }
}
