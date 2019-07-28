<?php

namespace App\Http\Controllers\Restaurant;

use App\Entities\Restaurant;
use App\Entities\User;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use App\Repositories\Interfaces\UserFavoriteRestaurantRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Rule;

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
     * @var Factory
     */
    private $validationFactory;
    /**
     * @var UserFavoriteRestaurantRepositoryInterface
     */
    private $userFavoriteRestaurantRepository;

    /**
     * ListRestaurantsAction constructor.
     * @param RestaurantRepositoryInterface $restaurantRepository
     * @param Factory $validationFactory
     * @param UserFavoriteRestaurantRepositoryInterface $userFavoriteRestaurantRepository
     */
    public function __construct(
        RestaurantRepositoryInterface $restaurantRepository,
        Factory $validationFactory,
        UserFavoriteRestaurantRepositoryInterface $userFavoriteRestaurantRepository
    )
    {
        $this->restaurantRepository = $restaurantRepository;
        $this->validationFactory = $validationFactory;
        $this->userFavoriteRestaurantRepository = $userFavoriteRestaurantRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $this->validate($data = $request->all());

        return response()->json([
            'data' => $this->restaurantRepository->findMany(
                $request->get('search'),
                $request->get('sort'),
                $request->get('sorting_value'),
                $this->userFavoriteRestaurantRepository->findMyFavoriteRestaurants(User::USERNAME)->pluck('restaurantName')->all()
            )
        ]);
    }


    /**
     * @param array $data
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validate($data)
    {
        $this->validationFactory->validate($data, [
            'sorting_value' => ['nullable', Rule::in(Restaurant::getSortingValues())],
            'search' => ['nullable', 'string', 'max:255'],
            'sort' => ['nullable', Rule::in(Restaurant::getStatuses())]
        ]);
    }
}
