<?php namespace SimdesApp\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBelanja extends UuidModel {

    Use SoftDeletes;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transaksi_belanja';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    // protected $with = [''];

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
        'belanja_id',
        'nomor_bukti',
        'tanggal',
        'jumlah',
        'item',
        'harga',
        'standar_satuan_harga_id',
        'pejabat_desa_id'
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
            \Cache::section('transaksi-belanja')->flush();
        });

        static::updating(function ($model) {
            // flush the cache section
            \Cache::section('transaksi-belanja')->flush();
        });

        static::deleting(function ($model) {
            // flush the cache section
            \Cache::section('transaksi-belanja')->flush();
        });
    }
}
