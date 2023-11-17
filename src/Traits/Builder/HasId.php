<?php

namespace Digiti\FormBuilder\Traits\Builder;

trait HasId
{
    protected string | null  $id = null;

    public function id(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): string | null
    {
        return $this->id;
    }
}
