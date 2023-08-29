<?php

namespace Digiti\FormBuilder\Livewire\Framework\Layout;

use Digiti\FormBuilder\Builder\Fieldtypes\Text;
use Livewire\Component;
use Digiti\FormBuilder\Builder\Layout\Chapter as Layout;
use Digiti\FormBuilder\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;
use Digiti\FormBuilder\Builder\Layout\Step;
use Digiti\FormBuilder\Traits\Livewire\HasValue;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;

class Fieldtype extends Component
{
    use HasParent;

    //#[Reactive]
    public $object;
    public $result;

    public $key;
    public bool $hasErrors = false;

    // TODO: bug, When uncommenting the value is getting removed on update
    // #[On('input-errors.{object.name}')]
    // public function errorHandling($name, $value, $errors){
    //     $this->hasErrors = isset($errors['value']) ? true : false;
    // }

    public function render()
    {
        return view('livewire.framework.layout.fieldtype');
    }
}
