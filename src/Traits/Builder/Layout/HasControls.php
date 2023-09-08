<?php

namespace Digiti\FormBuilder\Traits\Builder\Layout;

trait HasControls
{
    protected bool $showControls = true;

    public function hideControls(): static
    {
        $this->showControls = false;
        return $this;
    }

    public function hasControls(): bool
    {
        return $this->showControls;
    }
}
