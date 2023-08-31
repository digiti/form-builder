<?php

namespace App\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use App\Builder\Fieldtypes\Range as Input;
use App\Traits\Livewire\HasValue;
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
        return view('livewire.' . $this->object->getView(true));
    }
}
