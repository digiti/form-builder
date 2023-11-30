<?php

namespace Digiti\FormBuilder\Commands;

class MakeFormCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:form {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a livewire form using the digiti form-builder';


    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPaths(): array
    {
        return [
            __DIR__ . '/../../stubs/livewire/form.stub'
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
            'NAMESPACE'         => 'App\\Livewire\\Forms',
            'CLASS_NAME'        => $this->getSingularClassName($this->argument('name')),
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
            base_path('app/Livewire/Forms') .'/' .$this->getSingularClassName($this->argument('name')) . '.php'
        ];
    }
}
