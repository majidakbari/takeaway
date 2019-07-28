<?php

namespace App\Repositories\File;

use App\Entities\Restaurant;
use App\Repositories\File\Abstraction\AbstractFileRepository;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
     * @param null|array $favorite
     * @return array
     */
    public function findMany($search, $sort, $sortingValue, $favorite = null)
    {
        $data = $this->getDataSource();

        if (!empty($search)) {
            //performing a like query in the collection
            $data = $data->filter(function (Restaurant $item) use ($search) {
                return false !== stristr($item->name, $search);
            });
        }

        if ($data->isNotEmpty() && !empty($favorite)) {
            /** @var Restaurant $restaurant */
            foreach ($data as $restaurant) {
                if (in_array($restaurant->getName(), $favorite)) {
                    $restaurant->setIsFavorite(true);
                }
            }
        }

        $data = $data->groupBy(function(Restaurant $record) use ($favorite){
            return in_array($record->getName(), $favorite);
        });

        $data = array_map(function (Collection $item) use ($sort){
            return $item->sortBy(function(Restaurant $record) use ($sort) {
                return array_search($record->status, Restaurant::getSortOrder($sort));
            });
        }, $data->all());

        $data = array_map(function(Collection $item) {
            return $item->groupBy('status');
        }, $data);

        $data = array_map(function (Collection $element) use ($sortingValue) {
            return array_map(function ($item) use ($sortingValue){
                return $item->sortByDesc("sortingValues.$sortingValue");
            }, $element->all());

        }, $data);


        return collection_to_array($data);
    }

    /**
     * @param $name
     * @return Restaurant
     */
    public function findByName($name)
    {
        $data = $this->getDataSource()->where('name', $name);

        if ($data->isNotEmpty()) {
            return $data->first();
        }

        throw new ModelNotFoundException();
    }
}
