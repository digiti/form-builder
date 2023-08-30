<?php

namespace App\Livewire\Framework\Content;

use Livewire\Component;
use App\Builder\Content\Column as Input;
use App\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Column extends Component
{

    // #[Reactive]
    public Input $object;

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
