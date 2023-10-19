<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Traits\Builder\Layout\HasSchema;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\IsReactive;
use Digiti\FormBuilder\Traits\EvaluatesClosures;
use Digiti\FormBuilder\Traits\Builder\HasDebug;

use Livewire\Wireable;

class Div implements Wireable
{
    use HasDebug;
    use HasSchema;
    use HasWireables;
    use HasClasses;
    use IsReactive;
    use EvaluatesClosures;

    protected string $view = 'form-builder::content.div';

    public function __construct(array $schema)
    {
        $this->classes = 'content-div';
        $this->schema($schema);
        $this->setConstructAttributeKey('schema');
    }

    public static function make(array $schema)
    {
        $form = new static($schema);

        return $form;
    }

    public function getView(): string
    {
        return $this->view;
    }
}