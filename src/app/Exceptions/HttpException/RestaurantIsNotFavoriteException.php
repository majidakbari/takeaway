<?php

namespace App\Exceptions\HttpException;

/**
 * Class RestaurantIsNotFavoriteException
 * @package App\Exceptions\HttpException
 */
class RestaurantIsNotFavoriteException extends HttpException
{
    /**
     * RestaurantIsNotFavoriteException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            1002,
            get_class_name($this),
            trans('app.RestaurantIsNotFavoriteException'),
            400
        );
    }
}
