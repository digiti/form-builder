<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasId;
use Digiti\FormBuilder\Traits\Builder\HasName;

class Heading extends BuilderCore
{
    use HasClasses;
    use HasId;
    use HasName;

    protected string $view = 'form-builder::content.heading';
    protected int $level = 2;

    public function level(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }


    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-heading';
        $this->setConstructAttributeKey('name');
    }

    public static function make(string $name)
    {
        $form = new static($name);

        return $form;
    }


}
