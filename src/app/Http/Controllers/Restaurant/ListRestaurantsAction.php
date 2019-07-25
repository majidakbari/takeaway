<?php

namespace App\Http\Controllers\Restaurant;

use App\Repositories\Interfaces\RestaurantRepositoryInterface;

/**
 * Class ListRestaurantsAction
 * @package App\Http\Controllers\Restaurant
 */
class ListRestaurantsAction
{

    /**
     * @var RestaurantRepositoryInterface
     */
    private $restaurantRepository;

    /**
     * ListRestaurantsAction constructor.
     * @param RestaurantRepositoryInterface $restaurantRepository
     */
    public function __construct(RestaurantRepositoryInterface $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function __invoke()
    {
        dd($this->restaurantRepository->findMany());
        // TODO: Implement __invoke() method.
    }
}
