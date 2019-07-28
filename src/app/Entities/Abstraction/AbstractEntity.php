<?php

namespace App\Entities\Abstraction;


Abstract class AbstractEntity
{
    /**
     * @return false|string
     */
    public function __toString()
    {
       return json_encode($this->toArray());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}
