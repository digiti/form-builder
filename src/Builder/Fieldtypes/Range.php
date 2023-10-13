<?php

namespace Digiti\FormBuilder\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasMinMax;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasSuffix;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasPrefix;

class Range extends Fieldtype
{
    use HasMinMax;
    use HasSuffix;
    use HasPrefix;

    protected string $defaultRule = "numeric|";
    protected string $view = 'form-builder::livewire.fieldtypes.range';
    protected string $classes = 'range-fieldtype';
    protected int | null $step = null;

    public function step(int $step)
    {
        $this->step = $step;

        return $this;
    }

    public function getStep()
    {
        return $this->step;
    }
}
