<?php

namespace Digiti\FormBuilder\Livewire\Fieldtypes;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Fieldtypes\Range as Input;
use Digiti\FormBuilder\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Range extends Component
{
    use HasValue;

    #[Reactive]
    public Input $object;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->name] ?? ($this->object->getMax() - $this->object->getMin())/2;
    }

    public function render()
    {
        return view($this->object->getView(true));
    }
}
