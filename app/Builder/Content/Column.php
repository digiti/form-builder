<?php

namespace App\Builder\Content;

use App\Traits\Builder\Layout\HasSchema;
use App\Traits\Builder\HasWireables;
use App\Traits\Builder\HasClasses;
use App\Traits\Builder\IsReactive;
use App\Traits\EvaluatesClosures;
use App\Traits\Builder\HasDebug;

use Livewire\Wireable;

class Column implements Wireable
{
    use HasDebug;
    use HasSchema;
    use HasWireables;
    use HasClasses;
    use IsReactive;
    use EvaluatesClosures;

    protected string $view = 'framework.content.column';

    public function __construct(array $schema)
    {
        $this->classes = 'content-col';
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
