<?php

namespace App\Http\Controllers\Restaurant;

use App\Entities\Restaurant;
use App\Entities\User;
use App\Entities\UserFavoriteRestaurant;
use App\Exceptions\HttpException\RestaurantAlreadyIsFavoriteException;
use App\Exceptions\HttpException\RestaurantIsNotFavoriteException;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use App\Repositories\Interfaces\UserFavoriteRestaurantRepositoryInterface;

/**
 * Class FavoriteRestaurantAction
 * @package App\Http\Controllers\Restaurant
 */
class UnfavoriteRestaurantAction
{
    /**
     * @var RestaurantRepositoryInterface
     */
    private $restaurantRepository;
    /**
     * @var UserFavoriteRestaurantRepositoryInterface
     */
    private $userFavoriteRestaurantRepository;

    /**
     * FavoriteRestaurantAction constructor.
     * @param RestaurantRepositoryInterface $restaurantRepository
     * @param UserFavoriteRestaurantRepositoryInterface $userFavoriteRestaurantRepository
     */
    public function __construct(
        RestaurantRepositoryInterface $restaurantRepository,
        UserFavoriteRestaurantRepositoryInterface $userFavoriteRestaurantRepository
    )
    {
        $this->restaurantRepository = $restaurantRepository;
        $this->userFavoriteRestaurantRepository = $userFavoriteRestaurantRepository;
    }

    /**
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($name)
    {
        $restaurant = $this->restaurantRepository->findByName($name);

        $this->userFavoriteRestaurantRepository->delete($this->checkAccess($restaurant));

        return response()->json(null, 204);
    }


    /**
     * @param Restaurant $restaurant
     * @return UserFavoriteRestaurant
     */
    private function checkAccess(Restaurant $restaurant)
    {
        $record = $this->userFavoriteRestaurantRepository->findOneByCriteria(['username' => User::USERNAME, 'restaurantName' => $restaurant->getName()]);

        if (!$record) {
            throw new RestaurantIsNotFavoriteException();
        }

        return $record;
    }

}
