<?php

namespace App\Builder\Fieldtypes;

use App\Traits\Builder\Fieldtypes\HasMultiple;
use App\Traits\Builder\Fieldtypes\HasOptions;

class Check extends Fieldtype
{
    use HasOptions;
    use HasMultiple;

    protected string $view = 'framework.fieldtypes.check';
    protected string $classes = 'check-fieldtype';
}
