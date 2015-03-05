<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model {

    /**
     * @var string
     */
    protected $table = 'jenis';

    /**
     * @var string
     */
    protected $with = 'kelompok';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rekening',
        'kelompok_id',
        'jenis',
        'status'
    ];

    /**
     * @var string
     */
    protected $primaryKey = '_id';

    /**
     * @var array
     */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelompok()
    {
        return $this->belongsTo('SimdesApp\Models\Kelompok', 'kelompok_id');
    }
}
