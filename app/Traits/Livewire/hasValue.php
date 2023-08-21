<?php

namespace App\Traits\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;

trait HasValue
{
    public mixed $value;
    public mixed $defaultValue;

    public function mount()
    {
        $this->value = $this->defaultValue[$this->object->name] ?? null;
    }

    public function updatedValue()
    {
        $this->dispatch(
            'input-updated',
            name: $this->object->name,
            value: $this->value
        );

        // $validation = Validator::make(['value' => $this->value], ['value' => $this->object->getRules()])->errors();
        // $errors = count($validation->messages()) > 0 ? $validation->messages() : null ;

        // $this->dispatch(
        //     'input-errors.'.$this->object->name,
        //     name: $this->object->name,
        //     value: $this->value,
        //     errors: $errors
        // );
    }
}
