<?php

namespace App\Entities;

use App\Entities\Abstraction\AbstractEntity;
use App\Entities\Interfaces\EntityInterface;

/**
 * Class Restaurant
 * @property string $username
 * @package App\Entities
 */
class User extends AbstractEntity implements EntityInterface
{

    /**
     * In this project, the authentication process is ignored, so we use the following username for all requests
     */
    const USERNAME = 'majid';

    /**
     * @var string
     */
    private $username;

    /**
     * Restaurant constructor.
     * @param string $username
     */
    public function __construct($username)
    {
        $this->username = $username;
    }


    /**
     * Factory design pattern
     * @param array $options
     * @return $this
     */
    public static function fromArray($options)
    {
        return new static($options['username'] ?? '');
    }
}

