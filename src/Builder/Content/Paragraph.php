<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasId;
use Digiti\FormBuilder\Traits\Builder\HasName;
use Digiti\FormBuilder\Traits\Builder\HasWireables;

class Paragraph extends BuilderCore
{
    use HasClasses;
    use HasId;
    use HasName;
    use HasWireables;

    protected string $view = 'form-builder::content.paragraph';

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
