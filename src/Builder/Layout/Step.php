<?php

namespace Digiti\FormBuilder\Builder\Layout;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasDebug;
use Digiti\FormBuilder\Traits\Builder\Layout\HasSchema;
use Digiti\FormBuilder\Traits\Builder\Layout\HasDescription;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Digiti\FormBuilder\Traits\Builder\Layout\HasTitle;
use Digiti\FormBuilder\Traits\Builder\Layout\HasControls;
use Digiti\FormBuilder\Traits\Builder\IsReactive;
use Digiti\FormBuilder\Traits\EvaluatesClosures;

class Step extends BuilderCore
{
    use HasTitle;
    use HasDebug;
    use HasSchema;
    use HasWireables;
    use HasDescription;
    use IsReactive;
    use EvaluatesClosures;
    use HasControls;
    use HasClasses;

    protected string $view = 'form-builder::livewire.layout.step';

    public function __construct(array $schema)
    {
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
