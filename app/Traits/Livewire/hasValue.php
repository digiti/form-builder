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

    // Hacking in defaultValues from localStorage
    // Wasn't able to do this with #[Reactive]
    // The data stopped at fieldtype.blade.php because fieldtypes weren't refreshed.
    // This is a workaround.
    #[On('get-values-localstorage')]
    public function updateResultsFromLocalStorage($content)
    {
        $this->defaultValue = $content;
        $this->mount();
    }
}
