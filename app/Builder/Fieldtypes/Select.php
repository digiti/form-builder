<?php

namespace App\Builder\Fieldtypes;

use App\Traits\Builder\Fieldtypes\HasMultiple;
use App\Traits\Builder\Fieldtypes\HasOptions;

class Select extends Fieldtype
{
    use HasOptions;
    use HasMultiple;

    protected string $view = 'framework.fieldtypes.select';
    protected string $classes = 'select-fieldtype';
}
