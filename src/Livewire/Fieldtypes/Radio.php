<?php

namespace Digiti\FormBuilder\Livewire\Fieldtypes;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Fieldtypes\Radio as Input;
use Digiti\FormBuilder\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Radio extends Component
{
    use HasValue;

    #[Reactive]
    public Input $object;

    public function render()
    {
        return view('livewire.' . $this->object->getView(true));
    }
}
