<?php

namespace App\UseCases;

use App\Repositories\RawMaterialRepositoryInterface;

class DeleteRawMaterial
{
    private RawMaterialRepositoryInterface $repository;

    public function __construct(RawMaterialRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}
