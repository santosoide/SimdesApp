<?php namespace SimdesApp\Models;


class Obyek extends UuidModel {

    protected $table = 'obyek';

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
            \Cache::section('obyek')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('obyek')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('obyek')->flush();
        });
    }
}
