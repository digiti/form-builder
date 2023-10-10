<?php

namespace Digiti\FormBuilder\View\Components\Content;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Digiti\FormBuilder\Builder\Content\Row as Input;

use Digiti\FormBuilder\Builder\Content\Column;

class Row extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Input $object, public array $result)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('form-builder::components.content.row');
    }
}
