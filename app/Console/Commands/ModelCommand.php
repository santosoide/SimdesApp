<?php namespace SimdesApp\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ModelCommand extends GeneratorCommand
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:uuid_model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Uuid Model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Uuid Model class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('plain')) {
            return __DIR__ . '/stubs/uuid_model.plain.stub';
        }

        return __DIR__ . '/stubs/uuid_model.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['plain', null, InputOption::VALUE_NONE, 'Generate an empty model class.'],
        ];
    }

}
