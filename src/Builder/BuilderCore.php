<?php

namespace Digiti\FormBuilder\Builder;

use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Livewire\Wireable;

class BuilderCore implements Wireable
{
    use HasWireables;

    public function isLivewire(){
        return str_contains($this->view, 'livewire');
    }

    public function isFieldtype(){
        return str_contains($this->view, 'fieldtypes');
    }
}
