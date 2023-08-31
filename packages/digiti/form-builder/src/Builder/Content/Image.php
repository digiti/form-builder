<?php

namespace App\Builder\Content;

use App\Traits\Builder\HasClasses;
use App\Traits\Builder\HasName;
use App\Traits\Builder\HasWireables;
use Livewire\Wireable;

class Image implements Wireable
{
    use HasClasses;
    use HasName;
    use HasWireables;

    protected string $view = 'components.content.column';
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
}
