<?php

namespace Digiti\FormBuilder;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormBuilderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /**
         * Register Commands
         */
        $this->commands([
            \Digiti\FormBuilder\Commands\MakeFormCommand::class,
            \Digiti\FormBuilder\Commands\MakeCustomComponentCommand::class
        ]);

        /**
         * Registers all Blade and Livewire components
         */
        Blade::componentNamespace('Digiti\\FormBuilder\\Views\\Components', 'form-builder');
        $this->loadLivewireComponents();

        /**
         * Registers and publishes all language files
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'form-builder');
        $this->publishes([
            __DIR__.'/../resources/lang' => $this->app->langPath('vendor/form-builder'),
        ]);

        /**
         * Publishes public assets
         */
        $this->publishes([
            __DIR__.'/../dist' => public_path('vendor/form-builder'),
        ], 'public');

        /**
         * Registers and publishes views
         */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form-builder');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/form-builder'),
        ], 'views');


        // Blade::directive('formBuilderStyles', function ($expression) {
        //     return '<link rel="stylesheet" href="/vendor/digiti/form-builder/dist/build/assets/main.css">';
        // });

        // Blade::directive('formBuilderScripts', function ($expression) {
        //     return '<script src="/vendor/digiti/form-builder/dist/build/assets/main.js"></script>';
        // });
    }

    protected function loadLivewireComponents()
    {
        $array = [
            "livewire.base" => \Digiti\FormBuilder\Livewire\FormBase::class,
            "livewire.layout.chapter" => \Digiti\FormBuilder\Livewire\Layout\Chapter::class,
            "livewire.layout.fieldtype-error" => \Digiti\FormBuilder\Livewire\Layout\FieldtypeError::class,
            "livewire.layout.step" => \Digiti\FormBuilder\Livewire\Layout\Step::class,
            "livewire.layout.column" => \Digiti\FormBuilder\Livewire\Layout\Column::class,
            "livewire.fieldtypes.check" => \Digiti\FormBuilder\Livewire\Fieldtypes\Check::class,
            "livewire.fieldtypes.radio" => \Digiti\FormBuilder\Livewire\Fieldtypes\Radio::class,
            "livewire.fieldtypes.range" => \Digiti\FormBuilder\Livewire\Fieldtypes\Range::class,
            "livewire.fieldtypes.select" => \Digiti\FormBuilder\Livewire\Fieldtypes\Select::class,
            "livewire.fieldtypes.text" => \Digiti\FormBuilder\Livewire\Fieldtypes\Text::class,
        ];

        foreach($array as $k => $v) {
            Livewire::component('form-builder::'.$k, $v);
        }
    }

    public function register()
    {

    }
}
