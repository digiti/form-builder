<?php

namespace App\Fieldtypes;

use Closure;
use Livewire\Wireable;
use App\Traits\Fieldtypes\HasOptions;
use App\Traits\Fieldtypes\HasWireables;

class Select extends Fieldtype implements Wireable
{
    use HasOptions;
    use HasWireables;

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
