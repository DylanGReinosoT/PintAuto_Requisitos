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

    public function execute(int $id, string $name, string $code, string $description, float $quantity, float $value, string $unit, \DateTime $date): RawMaterial
    {
        $rawMaterial = $this->repository->findById($id);
        $rawMaterial->setName($name);
        $rawMaterial->setCode($code);
        $rawMaterial->setDescription($description);
        $rawMaterial->setQuantity($quantity);
        $rawMaterial->setValue($value);
        $rawMaterial->setUnit($unit);
        $rawMaterial->setDate($date);

        return $this->repository->save($rawMaterial);
    }
}
