<?php

namespace App\Repositories\Interfaces;


/**
 * Interface RestaurantRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface RestaurantRepositoryInterface
{
    public function findMany($criteria = [], $perPage = 10, $page = 1, $select = '*', $sort = []);
}
