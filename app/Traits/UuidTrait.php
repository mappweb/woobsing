<?php

namespace App\Traits;

trait UuidTrait
{

    /**
     * Allow uuid as primary key on users table
     *
     * @var bool
     */
    //protected $allowUuid = false;

    /**
     * @return bool
     */
    public function getIncrementing()
    {
        if ($this->allowUuid){
            return false;
        }
        return true;
    }

    /**
     * @return string
     */
    public function getKeyType()
    {
        if ($this->allowUuid){
            return 'string';
        }
        return 'int';
    }
}
