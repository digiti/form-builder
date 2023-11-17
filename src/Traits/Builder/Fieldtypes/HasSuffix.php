<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

trait HasSuffix
{

    protected null| string $suffix = null;
    protected null| string $suffixForMin = null;
    protected null| string $suffixForMax = null;

    public function suffix(string | null $suffix, string | null $suffixForMin = null, string | null $suffixForMax = null): static
    {
        $this->suffix = $suffix;
        $this->suffixForMin = $suffixForMin;
        $this->suffixForMax = $suffixForMax;

        return $this;
    }

    public function getSuffix(): string | null {
        return $this->suffix;
    }

    public function getSuffixForMin(): string | null {
        return $this->suffixForMin;
    }

    public function getSuffixForMax(): string | null {
        return $this->suffixForMax;
    }
}
