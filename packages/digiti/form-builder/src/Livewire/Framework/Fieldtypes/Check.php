<?php

namespace Digiti\FormBuilder\Livewire\Framework\Fieldtypes;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Fieldtypes\Check as Input;
use Digiti\FormBuilder\Traits\Livewire\HasValue;
use Livewire\Attributes\Reactive;

class Check extends Component
{
    use HasValue;

    #[Reactive]
    public Input $object;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->name] ?? [];
    }

    public function render()
    {
        return view('livewire.' . $this->object->getView());
    }
}
