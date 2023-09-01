<?php

namespace Digiti\FormBuilder\Builder\Fieldtypes;

use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasMultiple;
use Digiti\FormBuilder\Traits\Builder\Fieldtypes\HasOptions;

class Radio extends Fieldtype
{
    use HasOptions;
    use HasMultiple;

    protected string $view = 'fb::livewire.fieldtypes.radio';
    protected string $classes = 'radio-fieldtype';
}
