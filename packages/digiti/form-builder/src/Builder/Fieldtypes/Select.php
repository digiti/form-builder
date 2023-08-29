<?php

namespace Digiti\FormBuilder\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasMultiple;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasOptions;

class Select extends Fieldtype
{
    use HasOptions;
    use HasMultiple;

    protected string $view = 'framework.fieldtypes.select';
    protected string $classes = 'select-fieldtype';
}
