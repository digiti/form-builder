<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasName;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Livewire\Wireable;

class Image implements Wireable
{
    use HasClasses;
    use HasName;
    use HasWireables;

    protected string $view = 'fb::content.image';
    protected string $alt = '';

    public function alt(string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAlt()
    {
        return $this->alt;
    }

    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-col col';
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
