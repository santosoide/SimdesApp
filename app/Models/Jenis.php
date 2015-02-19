<?php namespace SimdesApp\Models;

class Jenis extends UuidModel {

    //Use SoftDeletes;

    protected $table = 'jenis';

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
            \Cache::section('jenis')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('jenis')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('jenis')->flush();
        });
    }

}
