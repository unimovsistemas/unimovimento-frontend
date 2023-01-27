<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * This trait provide an auto generator for public ids.
 * Is important the final user never see the ID primary key for the security of system
 * To use, you just need to import Trait on your model. After, just add a column named 'public_id' on your migration
 * The 'public_id' column needs be unique, index and unsigned.
 *
 * Attention: The getRouteKeyName method will to set a customized key name to the Route Model Binding
 * @see https://laravel.com/docs/5.4/routing#route-model-binding
 *
 * @package App\Traits
 */
trait PublicId
{

    public function getRouteKeyName()
    {
        return 'public_id';
    }

    /**
     * Binds creating/saving events to create UUIDs (and also prevent them from being overwritten).
     *
     * @return void
     */
    public static function bootPublicId()
    {
        static::creating(function ($model) {
            // Don't let people provide their own public ids, we will generate a proper one.
            $model->public_id = static::generatePublicId();
        });

        static::saving(function ($model) {
            // What's that, trying to change the public id huh?  Nope, not gonna happen.
            $original_public_id = $model->getOriginal('public_id');

            if ($original_public_id !== $model->public_id) {
                $model->public_id = $original_public_id;
            }
        });
    }

    /**
     * Recursive method to generate a unique id
     * Just will return a integer when the id generated isn't in another register of the current table
     *
     * @return int
     */
    public static function generatePublicId()
    {
        $public_id = mt_rand(100000, 99999999);

        $foo = parent::where('public_id', $public_id)->first();

        if ($foo)
            return static::generatePublicId();

        return $public_id;
    }

    /**
     * Scope a query to only include models matching the supplied PUBLIC ID.
     * Returns the model by default, or supply a second flag `false` to get the Query Builder instance.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @param  \Illuminate\Database\Schema\Builder $query The Query Builder instance.
     * @param  string                              $public_id The public id of the model.
     * @param  bool|true                           $first     Returns the model by default, or set to `false` to chain for query builder.
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    public function scopePublicId($query, $public_id, $first = true)
    {
        if (!is_integer($public_id)) {
            throw (new ModelNotFoundException)->setModel(get_class($this));
        }

        $search = $query->where('public_id', $public_id);

        return $first ? $search->firstOrFail() : $search;
    }
}
