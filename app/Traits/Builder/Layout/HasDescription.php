<?php

namespace App\Traits\Builder\Layout;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

trait HasDescription
{
    protected string $description;

    public function description(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
