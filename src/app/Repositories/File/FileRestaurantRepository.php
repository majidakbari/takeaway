<?php

namespace App\Repositories\File;

use App\Entities\Restaurant;
use App\Repositories\File\Abstraction\AbstractFileRepository;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class FileRestaurantRepository
 * @package App\Repositories\File
 */
class FileRestaurantRepository extends AbstractFileRepository implements RestaurantRepositoryInterface
{

    /**
     * @param string $search
     * @param string $sort
     * @param string $sortingValue
     * @return array
     */
    public function findMany($search, $sort, $sortingValue)
    {
        $result = [];

        $data = $this->dataSource;

        if (!empty($search)) {
            //performing a like query in the collection
            $data = $data->filter(function (Restaurant $item) use ($search) {
                return false !== stristr($item->name, $search);
            });
        }

        $data = $data->sortby(function (Restaurant $record) use ($sort, $sortingValue) {
            return array_search($record->status, Restaurant::getSortOrder($sort));
        });

        $data = array_map(function (Collection $item) use ($sortingValue){
            return $item->sortByDesc("sortingValues.$sortingValue");
        }, $data->groupBy('status')->all());

        if (!empty($data)) {
            /** @var Collection $value */
            foreach ($data as $value)
            $result = array_merge($result, $value->all());
        }

        return $result;
    }
}
