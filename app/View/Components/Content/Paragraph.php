<?php

namespace App\View\Components\Content;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Builder\Content\Paragraph as Input;

class Paragraph extends Component
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
        return view('components.content.paragraph');
    }
}