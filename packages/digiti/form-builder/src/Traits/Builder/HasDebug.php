<?php

namespace Digiti\FormBuilder\Traits\Builder;

use Illuminate\Support\Facades\Validator;

trait HasDebug
{
    public bool $debug = false;

    public function debug()
    {
        $this->debug = true;

        return $this;
    }

    public function hasDebug()
    {
        return $this->debug;
    }
}
