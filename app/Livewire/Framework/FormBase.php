<?php

namespace App\Livewire\Framework;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\OnFormSubmitted;

class FormBase extends Component
{
    public $result;

    #[On('input-updated')]
    public function updateResults($name, $value)
    {
        $this->result[$name] = $value;
    }

    public function saveForm() : void {
        OnFormSubmitted::dispatch($this->result);
    }

    public function render()
    {
        return view('livewire.framework.form-base');
    }
}
