<?php

namespace Digiti\FormBuilder\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Fieldtypes\Text as Input;
use Digiti\FormBuilder\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Text extends Component
{
    use HasValue;

    //#[Reactive]
    public Input $object;

    public function render()
    {
        return view('livewire.'.$this->object->getView());
    }
}
