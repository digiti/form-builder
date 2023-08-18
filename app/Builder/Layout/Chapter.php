<?php

namespace App\Builder\Layout;

use App\Traits\Builder\HasDebug;
use Livewire\Wireable;
use App\Traits\Builder\Layout\HasSchema;
use App\Traits\Builder\Layout\HasDescription;
use App\Traits\Builder\HasWireables;
use App\Traits\Builder\Layout\HasTitle;
use App\Traits\Builder\IsReactive;
use App\Traits\EvaluatesClosures;

class Chapter implements Wireable
{
    use HasTitle;
    use HasDebug;
    use HasSchema;
    use HasWireables;
    use HasDescription;
    use IsReactive;
    use EvaluatesClosures;

    protected string $view = 'framework.layout.chapter';
    protected bool $showConclusion = false;

    public function showConclusion()
    {
        $this->showConclusion = true;

        return $this;
    }

    public function hasConclusion(): bool
    {
        return $this->showConclusion;
    }

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
