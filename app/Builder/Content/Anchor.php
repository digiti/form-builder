<?php

namespace App\Builder\Content;

use App\Traits\Builder\HasClasses;
use App\Traits\Builder\HasName;
use App\Traits\Builder\HasWireables;

use Livewire\Wireable;

class Anchor implements Wireable
{
    use HasClasses;
    use HasName;
    use HasWireables;

    protected string $view = 'content.anchor';
    protected string $target;
    protected string $rel;

    protected string $label;

    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string {
        return $this->label ?? $this->name;

        // Get translated string
    }

    public function target(string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getTarget()
    {
        return $this->target ?? null;
    }

    public function rel(string $rel): static
    {
        $this->rel = $rel;

        return $this;
    }

    public function getRel()
    {
        return $this->rel ?? null;
    }

    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-button btn';
        $this->setConstructAttributeKey('name');
    }

    public static function make(string $name)
    {
        $form = new static($name);

        return $form;
    }

    public function getView(): string
    {
        return $this->view;
    }
}
