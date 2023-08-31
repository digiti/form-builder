<?php

namespace App\Builder\Content;

use App\Traits\Builder\HasClasses;
use App\Traits\Builder\HasName;
use App\Traits\Builder\HasWireables;

use Livewire\Wireable;

class Paragraph implements Wireable
{
    use HasClasses;
    use HasName;
    use HasWireables;

    protected string $view = 'content.paragraph';

    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-paragraph';
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
