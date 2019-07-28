<?php

namespace App\Repositories\File;

use App\Entities\UserFavoriteRestaurant;
use App\Repositories\File\Abstraction\AbstractFileRepository;
use App\Repositories\Interfaces\UserFavoriteRestaurantRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class FileUserFavoriteRestaurantRepository
 * @package App\Repositories\File
 */
class FileUserFavoriteRestaurantRepository extends AbstractFileRepository implements UserFavoriteRestaurantRepositoryInterface
{

    /**
     * @param string $username
     * @return UserFavoriteRestaurant
     */
    public function findMyFavoriteRestaurants($username)
    {
        // TODO: Implement findMyFavoriteRestaurants() method.
    }

    /**
     * @param UserFavoriteRestaurant $userFavoriteRestaurant
     * @return UserFavoriteRestaurant
     */
    public function store(UserFavoriteRestaurant $userFavoriteRestaurant)
    {
        $this->getDataSource()->push($userFavoriteRestaurant);
        $this->persist();

        return $userFavoriteRestaurant;
    }

    /**
     * @param UserFavoriteRestaurant $userFavoriteRestaurant
     * @return void
     */
    public function delete(UserFavoriteRestaurant $userFavoriteRestaurant)
    {
        $this->getDataSource()->pull($this->findId($userFavoriteRestaurant));
        $this->persist();
    }

    /**
     * @param array $criteria
     * @param bool $throwException
     * @return UserFavoriteRestaurant
     */
    public function findOneByCriteria($criteria, $throwException = false)
    {
        $result = $this->getDataSource();

        if (!empty($criteria['username'])) {
            $result = $result->where('username', $criteria['username']);
        }

        if (!empty($criteria['restaurantName'])) {
            $result = $result->where('restaurantName', $criteria['restaurantName']);
        }

        if ($result->isNotEmpty()) {
            $result = $result->first();
        } else {
            $result = null;
        }

        if ($throwException) {
            throw new ModelNotFoundException();
        }

        return $result;
    }

    /**
     * @param UserFavoriteRestaurant $userFavoriteRestaurant
     * @return int|null
     */
    private function findId(UserFavoriteRestaurant $userFavoriteRestaurant)
    {
        $result = $this->getDataSource()
            ->where('username', $userFavoriteRestaurant->getUsername())
            ->where('restaurantName', $userFavoriteRestaurant->getRestaurantName());

        if ($result->isNotEmpty()) {
            list($id) = array_keys($result->all());

            return $id;
        }

        return null;
    }
}
