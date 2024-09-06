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
            $stmt = $this->connection->prepare('UPDATE raw_materials SET name = ?, code = ?, description = ?, quantity = ?, value = ?, unit = ?, date = ? WHERE id = ?');
            $stmt->execute([
                $rawMaterial->getName(),
                $rawMaterial->getCode(),
                $rawMaterial->getDescription(),
                $rawMaterial->getQuantity(),
                $rawMaterial->getValue(),
                $rawMaterial->getUnit(),
                $rawMaterial->getDate()->format('Y-m-d'),
                $rawMaterial->getId()
            ]);
        } else {
            $stmt = $this->connection->prepare('INSERT INTO raw_materials (name, code, description, quantity, value, unit, date) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $rawMaterial->getName(),
                $rawMaterial->getCode(),
                $rawMaterial->getDescription(),
                $rawMaterial->getQuantity(),
                $rawMaterial->getValue(),
                $rawMaterial->getUnit(),
                $rawMaterial->getDate()->format('Y-m-d')
            ]);
            $rawMaterial->setId((int)$this->connection->lastInsertId());
        }

        return $rawMaterial;
    }

    public function findById(int $id): ?RawMaterial
    {
        $stmt = $this->connection->prepare('SELECT * FROM raw_materials WHERE id = ?');
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $rawMaterial = new RawMaterial(
                $data['name'],
                $data['code'],
                $data['description'],
                (float)$data['quantity'],
                (float)$data['value'],
                $data['unit'],
                new \DateTime($data['date'])
            );
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
            $rawMaterial = new RawMaterial(
                $data['name'],
                $data['code'],
                $data['description'],
                (float)$data['quantity'],
                (float)$data['value'],
                $data['unit'],
                new \DateTime($data['date'])
            );
            $rawMaterial->setId($data['id']);
            $rawMaterials[] = $rawMaterial;
        }

        return $rawMaterials;
    }
}
