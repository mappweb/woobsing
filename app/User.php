<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UuidTrait, EventManager;

    /**
     * Allow uuid as primary key on users table
     *
     * @var bool
     */
    protected $allowUuid = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'address',
    ];

    protected $appends = [
        'full_name'
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * @return array
     */
    public static function getColumnsTable(){
        return [
            ['data' => 'first_name', 'name' => 'first_name', 'title' => __('models/user.fillable.first_name')],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => __('models/user.fillable.last_name')],
            ['data' => 'phone', 'name' => 'phone', 'title' => __('models/user.fillable.phone')],
            ['data' => 'email', 'name' => 'email', 'title' => __('models/user.fillable.email')],
            ['data' => 'address', 'name' => 'address', 'title' => __('models/user.fillable.address')],
        ];
    }

}
