<?php
namespace SimdesApp\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


}