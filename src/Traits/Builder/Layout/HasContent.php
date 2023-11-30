<?php

namespace Digiti\FormBuilder\Traits\Builder\Layout;

trait HasContent
{
    protected mixed $content;

    public function content($content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): mixed
    {
        return $this->content;
    }
}
