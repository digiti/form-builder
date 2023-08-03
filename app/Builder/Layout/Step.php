<?php

namespace App\Builder\Layout;

use Livewire\Wireable;
use App\Traits\Builder\Layout\HasSchema;
use App\Traits\Builder\Layout\HasDescription;
use App\Traits\Builder\HasWireables;
use App\Traits\Builder\Layout\HasTitle;
use App\Traits\Builder\IsReactive;
use App\Traits\EvaluatesClosures;

class Step implements Wireable
{
    use HasTitle;
    use HasSchema;
    use HasWireables;
    use HasDescription;
    use IsReactive;
    use EvaluatesClosures;

    protected string $view = 'framework.layout.step';

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
