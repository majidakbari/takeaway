<?php

namespace App\Exceptions\HttpException;

/**
 * Class InvalidAcceptHeaderException
 * @package App\Exceptions\HttpException
 */
class RestaurantAlreadyIsFavoriteException extends HttpException
{
    /**
     * InvalidAcceptHeaderException constructor.
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
