<?php

namespace Digiti\FormBuilder\Traits\Builder;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

trait HasName
{
    //This value needs to be public to make validation
    public string $name;

    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLabelFromName(): string | Htmlable | null
    {
        $label = (string) Str::of($this->name)
            ->afterLast('.')
            ->kebab()
            ->replace(['-', '_'], ' ')
            ->ucfirst();

        return $label;

        // return (is_string($label) && $this->shouldTranslateLabel) ?
        //     __($label) :
        //     $label;
    }
}
