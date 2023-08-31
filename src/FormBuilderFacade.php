<?php

namespace Digiti\FormBuilder;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Digiti\FormBuilder
 */
class FormBuilderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'form-builder';
    }
}
