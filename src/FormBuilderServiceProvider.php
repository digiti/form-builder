<?php

namespace Digiti\FormBuilder;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormBuilderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        dd('test');
        /**
         * Registers all Blade components
         */
        Blade::componentNamespace('Digiti\\FormBuilder\\Views\\Components', 'form-builder');
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


        $this->loadLivewireComponents();

        /**
         * Registers and publishes views
         */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form-v');
        // $this->publishes([
        //     __DIR__.'/../resources/views' => resource_path('views/vendor/form-builder'),
        // ]);
    }

    protected function loadLivewireComponents()
    {
        $array = [
            "base" => \Digiti\FormBuilder\Livewire\FormBase::class,
            "layout.chapter" => \Digiti\FormBuilder\Livewire\Layout\Chapter::class,
            "layout.fieldtype-error" => \Digiti\FormBuilder\Livewire\Layout\FieldtypeError::class,
            "layout.step" => \Digiti\FormBuilder\Livewire\Layout\Step::class,
        ];

        foreach($array as $k => $v) {
            Livewire::component('form-builder::'.$k, $v);
        }
    }

    public function register()
    {
    }
}
