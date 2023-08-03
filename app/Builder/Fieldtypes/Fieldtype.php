<?php

namespace App\Builder\Fieldtypes;

use App\Traits\EvaluatesClosures;
use App\Traits\Builder\HasName;
use App\Traits\Builder\Fieldtypes\HasLabel;
use App\Traits\Builder\Fieldtypes\HasRequired;
use App\Traits\Builder\IsReactive;
use App\Traits\Builder\HasWireables;
use Livewire\Wireable;

class Fieldtype implements Wireable
{
    use HasName;
    use HasLabel;
    use IsReactive;
    use HasRequired;
    use HasWireables;
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
