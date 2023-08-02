<?php

namespace App\Traits;

use Closure;

trait EvaluatesClosures
{
    public function evaluate($value)
    {
        if ($value instanceof Closure) {
            return app()->call($value);
        }

        return $value;
    }
}
