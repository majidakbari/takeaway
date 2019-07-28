<?php

namespace App\Repositories\File\Abstraction;

use App\Entities\Interfaces\EntityInterface;
use Illuminate\Support\Collection;

/**
 * Class AbstractFileRepository
 * @package App\Repositories\File
 */
Abstract class AbstractFileRepository
{
    /**
     * @var Collection
     */
    protected $dataSource;


    /**
     * @var string
     */
    protected $filePath;


    /**
     * AbstractFileRepository constructor.
     * @param string $filePath
     * @param EntityInterface|string $entity
     */
    public function __construct($filePath, $entity)
    {
        $this->filePath = $filePath;

        $data = json_decode(file_get_contents($filePath), true);

        $data = array_map(function ($element) use ($entity) {
            return $entity::fromArray($element);
        }, $data ?? []);

        $this->dataSource = new Collection($data);
    }

    /**
     * @return Collection
     */
    public function getDataSource(): Collection
    {
        return $this->dataSource;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @return void
     */
    public function persist()
    {
        file_put_contents($this->getFilePath(), json_encode($this->getDataSource()->all()));
    }
}
