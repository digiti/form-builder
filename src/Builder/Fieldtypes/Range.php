<?php

namespace Digiti\FormBuilder\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasMinMax;

class Range extends Fieldtype
{
    use HasMinMax;

    protected string $defaultRule = "numeric|";
    protected string $view = 'fb::livewire.fieldtypes.range';
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
