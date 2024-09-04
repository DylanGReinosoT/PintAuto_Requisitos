<?php

namespace App\Controllers;

use App\UseCases\CreateRawMaterial;
use App\UseCases\GetRawMaterial;
use App\UseCases\UpdateRawMaterial;
use App\UseCases\DeleteRawMaterial;

class RawMaterialController
{
    private CreateRawMaterial $createRawMaterial;
    private GetRawMaterial $getRawMaterial;
    private UpdateRawMaterial $updateRawMaterial;
    private DeleteRawMaterial $deleteRawMaterial;

    public function __construct(
        CreateRawMaterial $createRawMaterial,
        GetRawMaterial $getRawMaterial,
        UpdateRawMaterial $updateRawMaterial,
        DeleteRawMaterial $deleteRawMaterial
    ) {
        $this->createRawMaterial = $createRawMaterial;
        $this->getRawMaterial = $getRawMaterial;
        $this->updateRawMaterial = $updateRawMaterial;
        $this->deleteRawMaterial = $deleteRawMaterial;
    }

    public function create($request)
    {
        $rawMaterial = $this->createRawMaterial->execute($request['name'], $request['description'], $request['quantity'], $request['unit']);
        return json_encode($rawMaterial);
    }

    public function get($id)
    {
        return $this->getRawMaterial->execute($id);
    }

    public function update($id, $request)
    {

        $rawMaterial = $this->updateRawMaterial->execute($id, $request['name'], $request['description'], $request['quantity'], $request['unit']);
        return json_encode($rawMaterial);
    }

    public function delete($id)
    {
        $this->deleteRawMaterial->execute($id);
        return json_encode(['status' => 'success']);
    }
}
