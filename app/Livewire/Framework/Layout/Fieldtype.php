<?php

namespace App\Livewire\Framework\Layout;

use App\Builder\Fieldtypes\Text;
use Livewire\Component;
use App\Builder\Layout\Chapter as Layout;
use App\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;
use App\Builder\Layout\Step;
use App\Traits\Livewire\HasValue;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;

class Fieldtype extends Component
{
    //TODO: Currently this livewire component is replaced by a normal Blade component. This decision was made because of the many reloads and problems with inputs going out of focus when updated. So need to reevaluate if this livewire component is needed in the future or not.
    // use HasParent;

    // //#[Reactive]
    // public $object;

    // //#[Reactive]
    // public $result;

    // public $key;
    // public bool $hasErrors = false;

    // // TODO: bug, When uncommenting the value is getting removed on update
    // // #[On('input-errors.{object.name}')]
    // // public function errorHandling($name, $value, $errors){
    // //     $this->hasErrors = isset($errors['value']) ? true : false;
    // // }

    // public function render()
    // {
    //     return view('livewire.framework.layout.fieldtype');
    // }
}
