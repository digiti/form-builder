<?php

namespace Digiti\FormBuilder\Livewire\Layout;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Layout\Column as Layout;
use Digiti\FormBuilder\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;

class Column extends Component
{
    use HasParent;

    #[Reactive]
    public $result;

    #[Reactive]
    public Layout $object;

    public function mount()
    {
        //dd($this->object);
    }

    public function render()
    {
        return view('form-builder::livewire.layout.column');
    }
}
