<?php

namespace App\Repositories\File;

use App\Repositories\Interfaces\RestaurantRepositoryInterface;

/**
 * Class FileRestaurantRepository
 * @package App\Repositories\File
 */
class FileRestaurantRepository extends AbstractFileRepository implements RestaurantRepositoryInterface
{

    public function findMany($criteria, $perPage, $page, $select, $sort)
    {
        dd($this->dataSource);
    }
}
