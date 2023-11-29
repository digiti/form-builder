<?php

namespace Digiti\FormBuilder\Builder\Content;

use Digiti\FormBuilder\Builder\BuilderCore;
use Digiti\FormBuilder\Traits\Builder\Layout\HasSchema;
use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasId;
use Digiti\FormBuilder\Traits\Builder\IsReactive;
use Digiti\FormBuilder\Traits\Builder\HasDebug;

class Row extends BuilderCore
{
    use HasDebug;
    use HasSchema;
    use HasClasses;
    use HasId;
    use IsReactive;

    protected string $view = 'form-builder::content.row';

    public function __construct(array $schema)
    {
        $this->classes = 'content-row row';
        $this->schema($schema);
        $this->setConstructAttributeKey('schema');
    }

    public static function make(array $schema)
    {
        $form = new static($schema);

        return $form;
    }


}
