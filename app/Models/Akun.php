<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model {

    protected $table = 'akun';
    protected $primaryKey = '_id';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            // flush the cache section
            \Cache::section('organisasi')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('organisasi')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('organisasi')->flush();
        });
    }

}
