<?php namespace SimdesApp\Models;


use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * @var string
     */
    protected $table = 'program';

    /**
     * @var array
     */
    protected $with = [
        'bidang',
        'organisasi'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rekening',
        'bidang_id',
        'program',
        'organisasi_id'
    ];

    /**
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
            \Cache::section('kewenangan-program')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('kewenangan-program')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('kewenangan-program')->flush();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bidang()
    {
        return $this->belongsTo('SimdesApp\Models\Bidang', 'bidang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
