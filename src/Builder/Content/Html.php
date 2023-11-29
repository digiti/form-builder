<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasId;
use Digiti\FormBuilder\Traits\Builder\HasName;

class Html extends BuilderCore
{
    use HasClasses;
    use HasId;
    use HasName;

    protected string $view = 'form-builder::content.html';

    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-html';
        $this->setConstructAttributeKey('name');
    }

    public static function make(string $name)
    {
        $form = new static($name);

        return $form;
    }


}
