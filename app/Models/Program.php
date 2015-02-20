<?php namespace SimdesApp\Models;


class Program extends UuidModel {

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'program';


    /**
     * @var array
     */
    // protected $with = [''];


    /**
     * @var array
     */
//    protected $fillable = [
//        '',
//        '',
//        '',
//    ];

    /**
     * Primary Key by the table
     *
     * @var string
     */
    protected $primaryKey = '_id';

    /**
     * Boot the Model
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function ($model) {
            // flush the cache section
            \Cache::section('program')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('program')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('program')->flush();
        });
    }
}
