<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasId;
use Digiti\FormBuilder\Traits\Builder\HasName;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Livewire\Wireable;

class Image implements Wireable
{
    use HasClasses;
    use HasId;
    use HasName;
    use HasWireables;

    protected string $view = 'form-builder::content.image';
    protected string $alt = '';
    protected bool $useGlide = false;
    protected $width = null;
    protected $height = null;

    public function alt(string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAlt()
    {
        return $this->alt;
    }

    public function useGlide(): static
    {
        $this->useGlide = true;

        return $this;
    }

    public function getGlide()
    {
        return $this->useGlide;
    }

    public function width(int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function height(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-image';
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
