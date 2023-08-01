<?php

namespace App\Builder\Fieldtypes;

use App\Traits\Builder\Fieldtypes\HasMultiple;
use App\Traits\Builder\Fieldtypes\HasOptions;
use App\Traits\Builder\HasWireables;

class Check extends Fieldtype
{
    use HasOptions;
    use HasMultiple;
    use HasWireables;

    protected string $view = 'framework.fieldtypes.check';
}
