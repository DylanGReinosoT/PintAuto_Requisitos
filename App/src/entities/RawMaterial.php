<?php

namespace App\Entities;

class RawMaterial
{
    private ?int $id = null;
    private string $name;
    private string $code;
    private string $description;
    private float $quantity;
    private float $value;
    private string $unit;
    private \DateTime $date;

    public function __construct(string $name, string $code, string $description, float $quantity, float $value, string $unit, \DateTime $date)
    {
        $this->name = $name;
        $this->code = $code;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->value = $value;
        $this->unit = $unit;
        $this->date = $date;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }
}
