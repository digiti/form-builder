<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Radio as Input;
use App\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Radio extends Component
{
    use HasValue;

    #[Reactive]
    public Input $object;

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
