<?php namespace SimdesApp\Models;


class Bidang extends UuidModel {

    protected $table = 'bidang';

    protected $with = 'kewenangan';

    protected $fillable = [
        'kode_rekening',
        'kewenangan_id',
        'bidang'
    ];

    protected $primaryKey = '_id';

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater'
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
            \Cache::section('bidang')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('bidang')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('bidang')->flush();
        });
    }

    public function kewenangan()
    {
        return $this->belongsTo('SimdesApp\Models\Kewenangan', 'kewenangan_id');
    }
}
