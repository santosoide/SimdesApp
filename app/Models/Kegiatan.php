<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{

    protected $table = 'kegiatan';

    protected $with = [
        'program',
        'organisasi'
    ];

    protected $fillable = [
        'kode_rekening',
        'program_id',
        'kegiatan',
        'organisasi_id'
    ];
    protected $primaryKey = '_id';

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

    public function program()
    {
        return $this->belongsTo('SimdesApp\Models\Program', 'program_id');
    }

    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }
}
