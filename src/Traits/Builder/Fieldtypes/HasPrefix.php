<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

trait HasPrefix
{

    protected string $prefix = '';

    public function prefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getPrefix(): string {
        return $this->prefix;
    }
}
