<?php

namespace Digiti\FormBuilder\Builder\Layout;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\Layout\HasSchema;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\IsReactive;
use Digiti\FormBuilder\Traits\EvaluatesClosures;
use Digiti\FormBuilder\Traits\Builder\HasDebug;

class Column extends BuilderCore
{
    use HasDebug;
    use HasSchema;
    use HasWireables;
    use IsReactive;
    use EvaluatesClosures;
    use HasClasses;

    protected string $view = 'form-builder::livewire.layout.column';

    public function __construct(array $schema)
    {
        $this->classes = 'content-col col';
        $this->schema($schema);
        $this->setConstructAttributeKey('schema');
    }

    public static function make(array $schema)
    {
        $form = new static($schema);

        return $form;
    }


}
