<?php

namespace App\Entities;

class RawMaterial
{
    private ?int $id = null;
    private string $name;
    private string $description;
    private float $quantity;
    private string $unit;

    public function __construct(string $name, string $description, float $quantity, string $unit)
    {
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->unit = $unit;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }
}
