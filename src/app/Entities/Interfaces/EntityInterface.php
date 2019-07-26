<?php

namespace App\Entities\Interfaces;


/**
 * Interface EntityInterface
 * @package App\Entities\Interfaces
 */
interface EntityInterface
{
    /**
     * Factory design pattern
     * @param array $options
     * @return static
     */
    public static function fromArray($options);
}
