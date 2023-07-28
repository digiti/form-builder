<?php

namespace App\Fieldtypes;

use App\Traits\EvaluatesClosures;
use App\Traits\Fieldtypes\HasName;
use App\Traits\Fieldtypes\HasLabel;
use App\Traits\Fieldtypes\HasRequiredOption;

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
