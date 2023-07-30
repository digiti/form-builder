<?php

namespace App\Builder\Fieldtypes;

use App\Traits\EvaluatesClosures;
use App\Traits\Builder\HasName;
use App\Traits\Builder\Fieldtypes\HasLabel;
use App\Traits\Builder\Fieldtypes\HasRequiredOption;
use App\Traits\Builder\HasWireables;
use Livewire\Wireable;

class Fieldtype implements Wireable
{
    use HasName;
    use HasLabel;
    use HasWireables;
    use HasRequiredOption;
    use EvaluatesClosures;

    protected string $view = 'field';

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
}
