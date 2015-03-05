<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{

    /**
     * @var string
     */
    protected $table = 'kegiatan';

    /**
     * @var array
     */
    protected $with = [
        'program',
        'organisasi'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rekening',
        'program_id',
        'kegiatan',
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
            \Cache::section('kegiatan')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('kegiatan')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('kegiatan')->flush();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo('SimdesApp\Models\Program', 'program_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
