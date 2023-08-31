<?php

namespace App\Traits\Livewire;

use Illuminate\Support\Facades\Validator;

trait HasValue
{
    public mixed $value;
    public mixed $defaultValue;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->name] ?? null;
        //$this->validateValue(); // Does not work on initiation
    }

    public function updatedValue()
    {
        $this->dispatch(
            'input-updated',
            name: $this->object->name,
            value: $this->value
        );

        $this->validateValue();
    }

    protected function validateValue()
    {
        $validation = Validator::make(['value' => $this->value], ['value' => $this->object->getRules()])->errors();
        $errors = count($validation->messages()) > 0 ? $validation->messages() : null ;

        // Dispatches event to update error label
        $this->dispatch(
            'input-errors.'.$this->object->name,
            name: $this->object->name,
            value: $this->value,
            errors: $errors
        );

        // Dispatches event to update formbase
        $this->dispatch(
            'input-errors',
            name: $this->object->name,
            value: $this->value,
            errors: $errors
        );
    }
}
