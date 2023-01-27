<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;


trait Sluggable
{

    /**
     * Binds creating/saving events to create a slug (and also prevent them from being overwritten).
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::creating(function ($model) {// Don't let people provide their own public ids, we will generate a proper one.
            $model->slug = static::generateSlug($model);
        });

        static::saving(function ($model) {
            $model->slug = static::generateSlug($model);
        });
    }

    /**
     * Recursive method to generate a unique id
     * Just will return a integer when the id generated isn't in another register of the current table
     *
     * @return int
     */
    public static function generateSlug($model)
    {
        $slugglabe_column = static::$sluggable;

        // produce a slug based on the specific column
        $slug = str_slug($model->$slugglabe_column);

        if (
            $slug == '' || (!empty($slug) && $model->slug != $slug)
        ) {
            // check to see if any other slugs exist that are the same & count them
            $count = parent::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$' AND id <> '{$model->id}'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $slug = $count ? "{$slug}-{$count}" : $slug;
        }

        return $slug;
    }

    /**
     * Scope a query to only include models matching the supplied SLUG.
     * Returns the model by default, or supply a second flag `false` to get the Query Builder instance.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @param  \Illuminate\Database\Schema\Builder $query The Query Builder instance.
     * @param  string                              $public_id The public id of the model.
     * @param  bool|true                           $first     Returns the model by default, or set to `false` to chain for query builder.
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlug($query, $slug, $first = true)
    {
        if (!is_integer($slug)) {
            throw (new ModelNotFoundException)->setModel(get_class($this));
        }

        $search = $query->where('slug', $slug);

        return $first ? $search->firstOrFail() : $search;
    }
}
