<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

trait HasPrefix
{

    protected null| string $prefix = null;
    protected null| string $prefixForMin = null;
    protected null| string $prefixForMax = null;

    public function prefix(string | null $prefix, string | null $prefixForMin = null, string | null $prefixForMax = null): static
    {
        $this->prefix = $prefix;
        $this->prefixForMin = $prefixForMin;
        $this->prefixForMax = $prefixForMax;

        return $this;
    }

    public function getPrefix(): string |null {
        return $this->prefix;
    }

    public function getPrefixForMin(): string |null {
        return $this->prefixForMin;
    }

    public function getPrefixForMax(): string |null {
        return $this->prefixForMax;
    }
}
