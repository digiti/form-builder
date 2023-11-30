<?php

namespace Digiti\FormBuilder\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Str;


class BaseCommand extends Command implements PromptsForMissingInput
{
    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $i = 0;
        $paths = $this->getSourceFilePaths();
        $contents = $this->getSourceFiles();

        foreach($paths as $path)
        {
            $this->makeDirectory(dirname($path));

            if (!$this->files->exists($path)) {
                $this->files->put($path, $contents[$i]);
                $this->info("File : {$path} created");
            } else {
                $this->info("File : {$path} already exits");
            }
            $i++;
        }
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFiles(): array
    {
        foreach($this->getStubPaths() as $path){
            $result[] = $this->getStubContents($path, $this->getStubVariables());
        }

        return $result;
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;

    }

    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    public function getSingularViewName($name)
    {
        return Str::kebab($name);
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array
     */
    protected function promptForMissingArgumentsUsing()
    {
        return [
            'name' => 'What name would you like to give to your new form?',
        ];
    }
}
