<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait EventManager
{
    /**
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->allowUuid) {
                $model->{$model->getKeyName()} = (string)Str::uuid();
            }
        });
    }
}