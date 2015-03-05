<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model {

    /**
     * @var string
     */
    protected $table = 'akun';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rekening',
        'akun'
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
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            // flush the cache section
            \Cache::section('akun')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('akun')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('akun')->flush();
        });
    }

}
