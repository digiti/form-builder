<?php

namespace Digiti\FormBuilder\Builder\Layout;

use Digiti\FormBuilder\Traits\Builder\HasClasses;
use Digiti\FormBuilder\Traits\Builder\HasDebug;
use Livewire\Wireable;
use Digiti\FormBuilder\Traits\Builder\Layout\HasSchema;
use Digiti\FormBuilder\Traits\Builder\Layout\HasDescription;
use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Digiti\FormBuilder\Traits\Builder\Layout\HasTitle;
use Digiti\FormBuilder\Traits\Builder\IsReactive;
use Digiti\FormBuilder\Traits\EvaluatesClosures;

class Chapter implements Wireable
{
    use HasTitle;
    use HasDebug;
    use HasSchema;
    use HasWireables;
    use HasDescription;
    use IsReactive;
    use EvaluatesClosures;
    use HasClasses;

    protected string $view = 'form-builder::livewire.layout.chapter';
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
