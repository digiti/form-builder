<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Fieldtype extends Component
{
    public string $key;

    /**
     * Create a new component instance.
     */
    public function __construct(public mixed $object, public array $result)
    {
        $this->key = Str::random(20);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fieldtype');
    }
}
