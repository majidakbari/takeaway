<?php

namespace App\Http\Controllers\Restaurant;


use App\Repositories\Interfaces\RestaurantRepositoryInterface;

class UnfavoriteRestaurantAction
{
    /**
     * @var RestaurantRepositoryInterface
     */
    private $restaurantRepository;

    /**
     * FavoriteRestaurantAction constructor.
     * @param RestaurantRepositoryInterface $restaurantRepository
     */
    public function __construct(RestaurantRepositoryInterface $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }
}
