<?php

namespace Digiti\FormBuilder;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormBuilder extends ServiceProvider
{
    public function boot(): void
    {
        /**
         * Registers all Blade components
         */
        Blade::componentNamespace('FormBuilder\\Views\\Components', 'form-builder');
        //Livewire::component('some-component', SomeComponent::class);

        /**
         * Registers and publishes all language files
         */
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'form-builder');
        $this->publishes([
            __DIR__.'/../resources/lang' => $this->app->langPath('vendor/form-builder'),
        ]);

        /**
         * Publishes public assets
         */
        $this->publishes([
            __DIR__.'/../dist' => public_path('vendor/form-builder'),
        ], 'public');
    }
}
