<?php

namespace App\Repositories\File;

use App\Repositories\File\Abstraction\AbstractFileRepository;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;

/**
 * Class FileRestaurantRepository
 * @package App\Repositories\File
 */
class FileRestaurantRepository extends AbstractFileRepository implements RestaurantRepositoryInterface
{

    public function findMany($criteria = [], $perPage = 10, $page = 1, $select = '*', $sort = [])
    {
        dd($this->dataSource);
    }
}
