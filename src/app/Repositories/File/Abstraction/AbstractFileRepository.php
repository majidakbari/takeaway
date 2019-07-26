<?php

namespace App\Repositories\File\Abstraction;

use App\Entities\Interfaces\EntityInterface;
use Illuminate\Support\Collection;

/**
 * Class AbstractFileRepository
 * @package App\Repositories\File
 */
class AbstractFileRepository
{
    /**
     * @var Collection
     */
    protected $dataSource;


    /**
     * AbstractFileRepository constructor.
     * @param array $data
     * @param EntityInterface|string $entity
     */
    public function __construct(array $data, $entity)
    {
        $data = array_map(function ($element) use ($entity){
            return $entity::fromArray($element);
        }, $data);

        $this->dataSource = new Collection($data);
    }
}
