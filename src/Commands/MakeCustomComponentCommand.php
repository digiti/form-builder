<?php

namespace Digiti\FormBuilder\Commands;

class MakeCustomComponentCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:form-component {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a livewire form component using the digiti form-builder';


    /**
     * Return the stub files paths
     * @return string
     *
     */
    public function getStubPaths(): array
    {
        return [
            __DIR__ . '/../../stubs/classes/form-component.stub',
            __DIR__ . '/../../stubs/livewire/form-component.stub',
            __DIR__ . '/../../stubs/views/form-component.stub'
        ];
    }

    /**
    **
    * Map the stub variables present in stub to its value
    *
    * @return array
    *
    */
    public function getStubVariables()
    {
        return [
            'CLASSES_NAMESPACE'          => 'App\\Builder\\Forms\\Components',
            'LIVEWIRE_NAMESPACE'         => 'App\\Livewire\\Forms\\Components',
            'CLASS_NAME'                 => $this->getSingularClassName($this->argument('name')),
            'VIEW_NAME'                  => $this->getSingularViewName($this->argument('name')),
        ];
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePaths(): array
    {
        return [
            base_path('app/Builder/Forms/Components') .'/' .$this->getSingularClassName($this->argument('name')) . '.php',
            base_path('app/Livewire/Forms/Components') .'/' .$this->getSingularClassName($this->argument('name')) . '.php',
            base_path('resources/views/livewire/forms/components') .'/' .$this->getSingularViewName($this->argument('name')) . '.blade.php'
        ];
    }
}
