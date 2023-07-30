<?php

namespace App\Builder\Fieldtypes;

use Closure;
use Livewire\Wireable;
use App\Traits\Builder\Fieldtypes\HasOptions;
use App\Traits\Builder\Fieldtypes\HasWireables;

class Select extends Fieldtype
{
    use HasOptions;

    protected string $view = 'framework.fieldtypes.select';

    protected bool | Closure $isMultiple = false;

    public function multiple(bool | Closure $condition = true): static
    {
        $this->isMultiple = $condition;

        return $this;
    }

    public function isMultiple(): bool
    {
        return $this->evaluate($this->isMultiple);
    }
}
