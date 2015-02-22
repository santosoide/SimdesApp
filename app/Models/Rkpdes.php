<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Rkpdes extends UuidModel
{

    Use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rkpdes';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $with = [
        'users',
        'organisasi',
        'rpjmdes_program',
        //'dana_desa'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'user_creator',
        'user_updater',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'organisasi_id',
        'rpjmdes_program_id',
        'dana_desa_id',
        'tahun',
        'lokasi',
        'anggaran',
        'kegiatan',
        'pejabat_desa_id',
        'is_finish'
    ];

    /**
     * Primary Key by the table
     *
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
            \Cache::section('rkpdes')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('rkpdes')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('rkpdes')->flush();
        });
    }

    public function users()
    {
        return $this->belongsTo('SimdesApp\Models\User', 'user_id');
    }

    public function organisasi()
    {
        return $this->belongsTo('SimdesApp\Models\Organisasi', 'organisasi_id');
    }

    public function rpjmdes_program()
    {
        return $this->belongsTo('SimdesApp\Models\RpjmdesProgram', 'rpjmdes_program_id');
    }

//    public function dana_desa()
//    {
//        return $this->belongsTo('SimdesApp\Models\DanaDesa', 'dana_desa_id');
//    }
}
