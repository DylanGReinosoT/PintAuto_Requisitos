<?php

namespace App\Repositories;

use App\Entities\RawMaterial;

interface RawMaterialRepositoryInterface
{
    public function save(RawMaterial $rawMaterial): RawMaterial;
    public function findById(int $id): ?RawMaterial;
    public function delete(int $id): void;
}
