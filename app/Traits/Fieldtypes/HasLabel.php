<?php

namespace App\Traits\Fieldtypes;

use App\Traits\Fieldtypes\HasName;

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
