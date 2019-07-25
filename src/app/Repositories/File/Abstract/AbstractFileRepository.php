<?php

namespace App\Repositories\File;

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
     */
    public function __construct($data)
    {
        $this->dataSource = new Collection($data);
    }
}
