<?php

namespace Digiti\FormBuilder\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\EvaluatesClosures;
use Digiti\FormBuilder\Traits\Builder\HasName;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasLabel;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasRequired;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasValidation;
use Digiti\FormBuilder\Traits\Builder\HasDebug;
use Digiti\FormBuilder\Traits\Builder\IsReactive;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Livewire\Wireable;

class Fieldtype implements Wireable
{
    use HasName;
    use HasLabel;
    use HasDebug;
    use IsReactive;
    use HasRequired;
    use HasWireables;
    use HasValidation;
    use EvaluatesClosures;

    protected string $view = 'field';
    protected string $classes = 'field';

    public function __construct(string $name)
    {
        $this->name($name);
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

    public function getClasses(): string
    {
        return $this->classes;
    }
}
