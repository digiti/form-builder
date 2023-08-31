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

    protected string $parentView = 'fieldtype';
    protected string $view = '';
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

    public function getParentView(): string
    {
        return $this->parentView;
    }

    public function getView($input = false): string
    {
        return $input ? $this->view : $this->parentView;
    }

    public function getClasses(): string
    {
        return $this->classes;
    }
}
