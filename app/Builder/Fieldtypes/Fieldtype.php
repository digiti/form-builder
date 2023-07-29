<?php

namespace App\Builder\Fieldtypes;

use App\Traits\EvaluatesClosures;
use App\Traits\Builder\HasName;
use App\Traits\Builder\Fieldtypes\HasLabel;
use App\Traits\Builder\Fieldtypes\HasRequiredOption;

class Fieldtype
{
    use HasName;
    use HasLabel;
    use HasRequiredOption;
    use EvaluatesClosures;

    protected string $view = 'field';

    public function __construct(string $name)
    {
        $this->name($name);
    }

    public static function make(string $name)
    {
        $form = new static($name);

        return $form;
    }

    public function getField(): string
    {
        return $this->view;
    }
}
