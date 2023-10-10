<?php

namespace Digiti\FormBuilder\Livewire\Layout;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Layout\Chapter as Layout;
use Digiti\FormBuilder\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;
use Digiti\FormBuilder\Builder\Layout\Step;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;

class FieldtypeError extends Component
{
    public $object;
    public $message;

    protected function formatError($string){
        return str_replace(" value ", " ".lcfirst($this->object->getLabel())." ", $string);
    }

    #[On('input-errors.{object.name}')]
    public function errorHandling($name, $value, $errors){
        $this->message = isset($errors['value']) ? $this->formatError($errors['value'][0]) : null;
    }

    public function render()
    {
        return view('form-builder::livewire.layout.fieldtype-error');
    }
}
