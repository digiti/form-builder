<?php

namespace App\Fieldtypes;

use App\Traits\EvaluatesClosures;
use App\Traits\Fieldtypes\HasName;

class Fieldtype
{
    use HasName;
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
