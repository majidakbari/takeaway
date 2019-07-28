<?php

namespace App\Repositories\Interfaces;

use App\Entities\UserFavoriteRestaurant;

/**
 * Interface UserFavoriteRestaurantRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserFavoriteRestaurantRepositoryInterface
{

    /**
     * @param string $username
     * @return UserFavoriteRestaurant
     */
    public function findMyFavoriteRestaurants($username);


    /**
     * @param UserFavoriteRestaurant $userFavoriteRestaurant
     * @return UserFavoriteRestaurant
     */
    public function store(UserFavoriteRestaurant $userFavoriteRestaurant);


    /**
     * @param UserFavoriteRestaurant $userFavoriteRestaurant
     * @return void
     */
    public function delete(UserFavoriteRestaurant $userFavoriteRestaurant);


    /**
     * @param array $criteria
     * @param bool $throwException
     * @return UserFavoriteRestaurant
     */
    public function findOneByCriteria($criteria, $throwException = false);
}
