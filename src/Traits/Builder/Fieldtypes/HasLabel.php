<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\HasName;

trait HasLabel
{
    use HasName;

    protected string $label;

    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string {
        return $this->label ?? $this->getLabelFromName();

        // Get translated string
    }
}
