<?php

namespace Digiti\FormBuilder\Livewire\Fieldtypes;

use Livewire\Component;
use Livewire\Attributes\On;
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

    //TODO: Move to trait when available in future updates
    //This event can't be put in a Trait. Triggers on clicking next step
    #[On('validate-inputs')]
    public function validateOnDemand($progress = false){
        $this->validateValue($progress);
    }

    public function render()
    {
        return view($this->object->getView(true));
    }
}
