<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasName;
use Digiti\FormBuilder\Traits\Builder\HasWireables;

use Livewire\Wireable;

class Paragraph implements Wireable
{
    use HasClasses;
    use HasName;
    use HasWireables;

    protected string $view = 'fb::content.paragraph';

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
