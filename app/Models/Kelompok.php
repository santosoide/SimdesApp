<?php namespace SimdesApp\Models;


class Kelompok extends Model {

    protected $table = 'kelompok';

    protected $with = 'akun';

    protected $fillable = [
        'kode_rekening',
        'akun_id',
        'kelompok'
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
            \Cache::section('kelompok')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('kelompok')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('kelompok')->flush();
        });
    }

    public function akun()
    {
        return $this->belongsTo('SimdesApp\Models\Akun', 'akun_id');
    }
}
