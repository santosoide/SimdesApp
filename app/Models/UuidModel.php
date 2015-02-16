<?php namespace SimdesApp\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class UuidModel extends Model
{

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function ($model) {
            // generate _id
            $model->{$model->getKeyName()} = (string)$model->generateNewId();

            // created_at
            $model->created_at = $model->dateNow();

            // user creator
//            $model->user_creator = \Auth::user()->_id;
        });

        static::updating(function ($model) {
            // updated_at
            $model->updated_at = $model->dateNow();

            // user updater
//            $model->user_updater = \Auth::user()->_id;
        });
    }

    /**
     * Generate new Uuid
     *
     * @return \Webpatser\Uuid\Uuid
     * @throws \Exception
     */
    public function generateNewId()
    {
        return Uuid::generate(4);
    }

    /**
     * Get Date now by Carbon
     *
     * @return static
     */
    public function dateNow()
    {
        return Carbon::now();
    }

    /**
     * Get the user_id
     *
     * @return mixed
     */
    public function userId()
    {
//        return Auth::user()->_id;
    }

    /**
     * Get the organisasi_id
     *
     * @return mixed
     */
    public function organisasiId()
    {
//        return Auth::user()->organisasi_id;
    }

}
