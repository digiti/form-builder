<?php

namespace Digiti\FormBuilder\Traits\Builder\Layout;

trait HasContent
{
    protected array $content = [];

    public function content($content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): array
    {
        return $this->content;
    }
}
