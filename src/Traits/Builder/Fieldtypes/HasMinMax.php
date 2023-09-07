<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\HasName;

trait HasMinMax
{
    protected int | null $min = 0;
    protected int | null $max = 100;

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
}
