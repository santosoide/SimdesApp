<?php namespace SimdesApp\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
class FormRequestCommand extends GeneratorCommand
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:form_request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Form Request class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Form Request class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('plain')) {
            return __DIR__ . '/stubs/form_request.plain.stub';
        }

        return __DIR__ . '/stubs/form_request.stub';
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
        return $rootNamespace . '\Http\Requests';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['plain', null, InputOption::VALUE_NONE, 'Generate an custom form request class.'],
        ];
    }
}
