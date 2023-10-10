<?php

namespace Digiti\FormBuilder\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasMultiple;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasOptions;

class Check extends Fieldtype
{
    use HasOptions;
    use HasMultiple;

    protected string $view = 'form-builder::livewire.fieldtypes.check';
    protected string $classes = 'check-fieldtype';
}
