<?php

namespace App\Builder\Fieldtypes;

use App\Traits\Builder\HasWireables;

class Range extends Fieldtype
{
    use HasWireables;

    protected string $view = 'framework.fieldtypes.range';
    protected int | null $min = 0;
    protected int | null $max = 100;
    protected int | null $step = null;

    public function min(int $min)
    {
        $this->min = $min;

        return $this;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function max(int $max)
    {
        $this->max = $max;

        return $this;
    }

    public function getMax()
    {
        return $this->max;
    }

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
