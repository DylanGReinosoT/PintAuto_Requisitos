<?php

namespace App\UseCases;

use App\Entities\RawMaterial;
use App\Repositories\RawMaterialRepositoryInterface;

class CreateRawMaterial
{
    private RawMaterialRepositoryInterface $repository;

    public function __construct(RawMaterialRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(
        string $name,
        string $code,
        string $description,
        float $quantity,
        float $value,
        string $unit,
        \DateTime $date
    ): RawMaterial {
        $rawMaterial = new RawMaterial($name, $code, $description, $quantity, $value, $unit, $date);
        return $this->repository->save($rawMaterial);
    }
}
