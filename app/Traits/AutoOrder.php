<?php

namespace App\Traits;

trait AutoOrder
{
    public static function bootAutoOrder()
    {
        if(! isset(static::$_order_column))
            return;

        static::creating(function ($model) {
            $cln           = static::$_order_column;
            $model->{$cln} = static::getNextOrder();
        });
    }

    public static function getNextOrder()
    {
        return parent::max('ordem') + 1;
    }
}