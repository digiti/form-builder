<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasLabel;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasId;
use Digiti\FormBuilder\Traits\Builder\HasName;
class Anchor extends BuilderCore
{
    use HasName;
    use HasLabel;
    use HasClasses;
    use HasId;

    protected string $view = 'form-builder::content.anchor';
    protected string $target;
    protected string $rel;
    protected bool $dispatchable = false;

    protected string $label;

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



    public function dispatchable(): static
    {
        $this->dispatchable = true;

        return $this;
    }

    public function isDispatchable()
    {
        return $this->dispatchable;
    }
}
