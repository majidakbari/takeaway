<?php

namespace App\Exceptions\HttpException;

/**
 * Class RestaurantAlreadyIsFavoriteException
 * @package App\Exceptions\HttpException
 */
class RestaurantAlreadyIsFavoriteException extends HttpException
{
    /**
     * RestaurantAlreadyIsFavoriteException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            1001,
            get_class_name($this),
            trans('app.RestaurantAlreadyIsFavoriteException'),
            400
        );
    }
}
