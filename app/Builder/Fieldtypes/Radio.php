<?php

namespace App\Builder\Fieldtypes;

use App\Traits\Builder\Fieldtypes\HasMultiple;
use App\Traits\Builder\Fieldtypes\HasOptions;

class Radio extends Fieldtype
{
    use HasOptions;
    use HasMultiple;

    protected string $view = 'framework.fieldtypes.radio';
    protected string $classes = 'radio-fieldtype';
}
