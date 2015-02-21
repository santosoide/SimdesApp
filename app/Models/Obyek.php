<?php namespace SimdesApp\Models;


class Obyek extends UuidModel {

    protected $table = 'obyek';

    protected $with = [
        'jenis',
        'organisasi'
    ];

    protected $fillable = [
        'kode_rekening',
        'jenis_id',
        'obyek',
        'organisasi_id'
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

    public function jenis()
    {
        return $this->belongsTo('SimdesApp\Models\Jenis', 'jenis_id');
    }

    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
