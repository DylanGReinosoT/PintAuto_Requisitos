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

    public function execute(string $name, string $description, float $quantity, string $unit): RawMaterial
    {
        $rawMaterial = new RawMaterial($name, $description, $quantity, $unit);
        return $this->repository->save($rawMaterial);
    }
}
