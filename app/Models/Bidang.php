<?php namespace SimdesApp\Models;


use Illuminate\Database\Eloquent\Model;

class Bidang extends Model {

    /**
     * @var string
     */
    protected $table = 'bidang';

    /**
     * @var string
     */
    protected $with = 'kewenangan';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rekening',
        'kewenangan_id',
        'bidang'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kewenangan()
    {
        return $this->belongsTo('SimdesApp\Models\Kewenangan', 'kewenangan_id');
    }
}
