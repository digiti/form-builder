<?php

namespace Digiti\FormBuilder\View\Components\Content;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Digiti\FormBuilder\Builder\Content\Heading as Input;

class Heading extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Input $object)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('form-builder::components.content.heading');
    }
}
