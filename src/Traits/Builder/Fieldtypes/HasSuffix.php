<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

trait HasSuffix
{

    protected string $suffix = '';

    public function suffix(string $suffix): static
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function getSuffix(): string {
        return $this->suffix;
    }
}
