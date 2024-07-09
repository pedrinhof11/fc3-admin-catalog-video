<?php

namespace Core\Domain\Category\Entity;

use Core\Domain\Shared\ValueObject\Uuid;
use DateTimeImmutable;

class Category
{
    private function __construct(
        private Uuid               $id,
        private string             $name,
        private string             $description,
        private bool               $isActive,
        private DateTimeImmutable $createdAt,
        private DateTimeImmutable $updatedAt
    )
    {

        $this->validate();
    }

    private function validate()
    {
        (new CategoryValidator($this))->handle();
    }

    public static function create(
        string $name,
        string $description,
        bool   $isActive = true
    ): self
    {
        $id = Uuid::create();
        $createdAt = new DateTimeImmutable();
        $updatedAt = new DateTimeImmutable();
        return new Category(
            id: $id,
            name: $name,
            description: $description,
            isActive: $isActive,
            createdAt: $createdAt,
            updatedAt: $updatedAt
        );
    }

    public static function from (
        Uuid               $id,
        string             $name,
        string             $description,
        bool               $isActive,
        DateTimeImmutable | string $createdAt,
        DateTimeImmutable | string $updatedAt
    ): self
    {
        return new Category(
            id: $id,
            name: $name,
            description: $description,
            isActive: $isActive,
            createdAt: is_string($createdAt) ? new DateTimeImmutable($createdAt) : $createdAt,
            updatedAt: is_string($updatedAt) ? new DateTimeImmutable($updatedAt) : $updatedAt
        );
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function deactivate(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description): void
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): Uuid
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

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }

}