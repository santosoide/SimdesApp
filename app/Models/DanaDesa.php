<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class DanaDesa extends UuidModel
{

    Use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dana_desa';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    // protected $with = [''];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'user_creator',
        'user_updater',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'organisasi_id',
        'sumber_dana_id',
        'jumlah'
    ];

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
            \Cache::section('dana-desa')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('dana-desa')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('dana-desa')->flush();
        });
    }

}
