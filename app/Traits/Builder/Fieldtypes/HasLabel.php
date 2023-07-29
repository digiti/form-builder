<?php

namespace App\Traits\Builder\Fieldtypes;

use App\Traits\Builder\HasName;

trait HasLabel
{
    use HasName;

    protected string $label;

    public function Label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string {
        return $this->label ?? $this->getLabelFromName();

        // Get translated string
    }
}
