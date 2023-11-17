<?php

namespace Digiti\FormBuilder\Traits\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\HasName;

trait HasLabel
{
    use HasName;

    protected string $label;
    protected bool $hideLabel = false;

    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string {
        return $this->label ?? $this->getLabelFromName();

        // Get translated string
    }

    public function hideLabel(bool $hideLabel = true): static
    {
        $this->hideLabel = $hideLabel;

        return $this;
    }

    public function showLabel()
    {
        return !$this->hideLabel;
    }
}
