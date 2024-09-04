<?php

namespace App\Database;

use App\Entities\RawMaterial;
use App\Repositories\RawMaterialRepositoryInterface;
use PDO;

class MysqlRawMaterialRepository implements RawMaterialRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(RawMaterial $rawMaterial): RawMaterial
    {
        if ($rawMaterial->getId()) {
            $stmt = $this->connection->prepare('UPDATE raw_materials SET name = ?, description = ?, quantity = ?, unit = ? WHERE id = ?');
            $stmt->execute([
                $rawMaterial->getName(),
                $rawMaterial->getDescription(),
                $rawMaterial->getQuantity(),
                $rawMaterial->getUnit(),
                $rawMaterial->getId()
            ]);
        } else {
            $stmt = $this->connection->prepare('INSERT INTO raw_materials (name, description, quantity, unit) VALUES (?, ?, ?, ?)');
            $stmt->execute([
                $rawMaterial->getName(),
                $rawMaterial->getDescription(),
                $rawMaterial->getQuantity(),
                $rawMaterial->getUnit()
            ]);
            $rawMaterial->setId((int)$this->connection->lastInsertId());
        }

        return $rawMaterial;
    }

    public function findById(int $id): ?RawMaterial
    {
        $stmt = $this->connection->prepare('SELECT * FROM raw_materials WHERE id = ?');
        $stmt->execute([$id]);

        $data = $stmt->fetch();
        if ($data) {
            $rawMaterial = new RawMaterial($data['name'], $data['description'], (float)$data['quantity'], $data['unit']);
            $rawMaterial->setId($data['id']);
            return $rawMaterial;
        }

        return null;
    }


    public function delete(int $id): void
    {
        $stmt = $this->connection->prepare('DELETE FROM raw_materials WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query('SELECT * FROM raw_materials');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rawMaterials = [];

        foreach ($results as $data) {
            $rawMaterial = new RawMaterial($data['name'], $data['description'], (float)$data['quantity'], $data['unit']);
            $rawMaterial->setId($data['id']);
            $rawMaterials[] = $rawMaterial;
        }

        return $rawMaterials;
    }
}
