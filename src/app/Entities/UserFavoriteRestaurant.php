<?php

namespace App\Entities;

use App\Entities\Abstraction\AbstractEntity;
use App\Entities\Interfaces\EntityInterface;

/**
 * Class UserFavoriteRestaurant
 * @property string $restaurantName
 * @property string $username
 * @package App\Entities
 */
class UserFavoriteRestaurant extends AbstractEntity implements EntityInterface
{

    /**
     * @var string
     */
    public $restaurantName;

    /**
     * @var string
     */
    public $username;


    /**
     * Restaurant constructor.
     * @param $restaurantName
     * @param $username
     */
    public function __construct($restaurantName, $username)
    {
        $this->restaurantName = $restaurantName;
        $this->username = $username;
    }


    /**
     * Factory design pattern
     * @param array $options
     * @return $this
     */
    public static function fromArray($options)
    {
        return new static(
            $options['restaurantName'] ?? '',
            $options['username'] ?? ''
        );
    }
}

