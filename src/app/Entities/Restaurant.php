<?php

namespace App\Entities;

use App\Entities\Interfaces\EntityInterface;

/**
 * Class Restaurant
 * @property string $name
 * @property string $status
 * @property array $sortingValues
 * @package App\Entities
 */
class Restaurant implements EntityInterface
{
    //statuses
    const STATUS_OPEN = 'open';

    const STATUS_ORDER_AHEAD = 'order ahead';

    const STATUS_CLOSED = 'closed';


    //sorting values

    const SORTING_VALUE_NEWEST = 'newest';

    const SORTING_VALUE_BEST_MATCH = 'bestMatch';

    const SORTING_VALUE_RATING_AVERAGE = 'ratingAverage';

    const SORTING_VALUE_DISTANCE = 'distance';

    const SORTING_VALUE_POPULARITY = 'popularity';

    const SORTING_VALUE_AVERAGE_PRODUCT_PRICE = 'averageProductPrice';

    const SORTING_VALUE_DELIVERY_COSTS = 'deliveryCosts';

    const SORTING_VALUE_MIN_COST = 'minCost';

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $status;

    /**
     * @var array
     */
    public $sortingValues;


    /**
     * Restaurant constructor.
     * @param $name
     * @param $status
     * @param $sortingValues
     */
    public function __construct($name, $status, $sortingValues)
    {
        $this->name = $name;
        $this->status = $status;
        $this->sortingValues = $sortingValues;
    }


    /**
     * Factory design pattern
     * @param array $options
     * @return Restaurant
     */
    public static function fromArray($options)
    {
        return new static(
            $options['name'] ?? '',
            $options['status'] ?? '',
            $options['sortingValues'] ?? [],
        );
    }


    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_CLOSED,
            self::STATUS_OPEN,
            self::STATUS_ORDER_AHEAD
        ];
    }

    /**
     * @return array
     */
    public static function getSortingValues()
    {
        return [
            self::SORTING_VALUE_NEWEST,
            self::SORTING_VALUE_BEST_MATCH,
            self::SORTING_VALUE_RATING_AVERAGE,
            self::SORTING_VALUE_DISTANCE,
            self::SORTING_VALUE_POPULARITY,
            self::SORTING_VALUE_AVERAGE_PRODUCT_PRICE,
            self::SORTING_VALUE_DELIVERY_COSTS,
            self::SORTING_VALUE_MIN_COST
        ];
    }

    /**
     * @param string $sort
     * @return array
     */
    public static function getSortOrder($sort)
    {
        switch ($sort) {
            case self::STATUS_OPEN:
                $result = [self::STATUS_OPEN, self::STATUS_ORDER_AHEAD, self::STATUS_CLOSED];
                break;
            case self::STATUS_ORDER_AHEAD:
                $result = [self::STATUS_ORDER_AHEAD, self::STATUS_OPEN, self::STATUS_CLOSED];
                break;
            case self::STATUS_CLOSED:
                $result = [self::STATUS_CLOSED, self::STATUS_OPEN, self::STATUS_ORDER_AHEAD];
                break;
            default:
                $result = [self::STATUS_OPEN, self::STATUS_ORDER_AHEAD, self::STATUS_CLOSED];
        }

        return $result;
    }
}

