<?php

namespace App\Repositories\Interfaces;

use App\Entities\Restaurant;

/**
 * Interface RestaurantRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface RestaurantRepositoryInterface
{
    /**
     * @param string $search
     * @param string $sort
     * @param string $sortingValue
     * @param null|array $favoriteList
     * @return array
     */
    public function findMany($search, $sort, $sortingValue, $favoriteList = null);

    /**
     * @param $name
     * @return Restaurant
     */
    public function findByName($name);
}
