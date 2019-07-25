<?php

namespace App\Repositories\Interfaces;


/**
 * Interface RestaurantRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface RestaurantRepositoryInterface
{
    public function findMany($criteria, $perPage, $page, $select, $sort);
}
