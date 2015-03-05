<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdesMisi extends UuidModel {

    Use SoftDeletes;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rpjmdes_misi';

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
        'rpjmdes'
    ];

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
        'rpjmdes_id',
        'misi',
        'user_id',
        'organisasi_id'
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
            \Cache::section('rpjmdes-misi')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('rpjmdes-misi')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('rpjmdes-misi')->flush();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rpjmdes()
    {
        return $this->belongsTo('SimdesApp\Models\Rpjmdes', 'rpjmdes_id');
    }
}
