<?php

namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

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
     * @return array
     */
    public function findMany($search, $sort, $sortingValue);
}
