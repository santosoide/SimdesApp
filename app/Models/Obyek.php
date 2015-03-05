<?php namespace SimdesApp\Models;


use Illuminate\Database\Eloquent\Model;

class Obyek extends Model {

    /**
     * @var string
     */
    protected $table = 'obyek';

    /**
     * @var array
     */
    protected $with = [
        'jenis',
        'organisasi'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rekening',
        'jenis_id',
        'obyek',
        'organisasi_id'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenis()
    {
        return $this->belongsTo('SimdesApp\Models\Jenis', 'jenis_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
