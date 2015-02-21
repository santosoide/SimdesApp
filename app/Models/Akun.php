<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model {

    protected $table = 'akun';

    protected $fillable = [
        'kode_rekening',
        'akun'
    ];

    protected $primaryKey = '_id';

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater'
    ];

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
