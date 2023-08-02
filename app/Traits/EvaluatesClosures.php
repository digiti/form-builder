<?php

namespace App\Traits;

use Closure;

trait EvaluatesClosures
{
    protected Closure | null $reactive = null;

    public function reactive(Closure $closure)
    {
        $this->reactive = $closure;
        return $this;
    }

    public function getReactive()
    {
        dd($this->reactive);

        if ($this->reactive) {
            return $this->reactive;
        }
        return null;
    }


    public function evaluate($value)
    {
        if ($value instanceof Closure) {
            return app()->call($value);
        }

        return $value;
    }
}
