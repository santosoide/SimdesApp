<?php namespace SimdesApp\Models;


class Program extends Model
{

    protected $table = 'program';

    protected $with = [
        'bidang',
        'organisasi'
    ];

    protected $fillable = [
        'kode_rekening',
        'bidang_id',
        'program',
        'organisasi_id'
    ];

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

    public function bidang()
    {
        return $this->belongsTo('SimdesApp\Models\Bidang', 'bidang_id');
    }

    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
