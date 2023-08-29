<?php

namespace Digiti\FormBuilder;

use Illuminate\Support\Facades\Blade;

class FormBuilder
{
    public function boot(): void
    {
        Blade::componentNamespace('FormBuilder\\Views\\Components', 'form-builder');
        //Livewire::component('some-component', SomeComponent::class);
    }
}
