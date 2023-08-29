<?php

namespace Digiti\FormBuilder\Traits\Builder;

use Closure;

trait IsReactive
{
    protected bool | null $reactive = null;

    public function reactive(Closure $closure)
    {
        $this->reactive = $this->evaluate($closure);
        return $this;
    }

    public function getReactive()
    {
        return $this->reactive;
    }

    public function isReactive(): bool
    {
        return $this->reactive !== null;
    }
}
