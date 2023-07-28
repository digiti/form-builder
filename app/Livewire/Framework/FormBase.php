<?php

namespace App\Livewire\Framework;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Interfaces\FormInterface;

class FormBase extends Component
{
    public $result;

    #[On('input-updated')]
    public function updateResults($name, $value)
    {
        $this->result[$name] = $value;
    }

    public function render()
    {
        return view('livewire.framework.form-base');
    }
}
