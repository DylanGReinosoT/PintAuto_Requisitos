<?php

namespace App\UseCases;

use App\Repositories\RawMaterialRepositoryInterface;

class GetRawMaterial
{
    private RawMaterialRepositoryInterface $repository;

    public function __construct(RawMaterialRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        return $this->repository->findById($id);
    }
}
