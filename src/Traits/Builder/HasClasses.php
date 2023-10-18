<?php

namespace Digiti\FormBuilder\Traits\Builder;

trait HasClasses
{
    protected string $classes;

    public function classes(string $classes): static
    {
        $this->classes = $classes;

        return $this;
    }

    public function getClasses(): string
    {
        return $this->classes ?? '';
    }
}
