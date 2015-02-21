<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Rpjmdes extends UuidModel {

    Use SoftDeletes;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rpjmdes';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $with = [
        'users',
        'organisasi'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'visi',
        'user_id',
        'organisasi_id',
    ];

    /**
     * Primary Key by the table
     *
     * @var string
     */
    protected $primaryKey = '_id';

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
            \Cache::section('rpjmdes')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('rpjmdes')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('rpjmdes')->flush();
        });
    }

    public function users()
    {
        return $this->belongsTo('SimdesApp\Models\User', 'user_id');
    }

    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
