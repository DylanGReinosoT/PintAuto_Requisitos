<?php

namespace App\UseCases;

use App\Entities\RawMaterial;
use App\Repositories\RawMaterialRepositoryInterface;

class UpdateRawMaterial
{
    private RawMaterialRepositoryInterface $repository;

    public function __construct(RawMaterialRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, string $name, string $description, float $quantity, string $unit): RawMaterial
    {
        $rawMaterial = $this->repository->findById($id);
        $rawMaterial->setName($name);
        $rawMaterial->setDescription($description);
        $rawMaterial->setQuantity($quantity);
        $rawMaterial->setUnit($unit);

        return $this->repository->save($rawMaterial);
    }
}
