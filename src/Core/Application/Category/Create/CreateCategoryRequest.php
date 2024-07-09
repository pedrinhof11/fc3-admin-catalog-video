<?php

namespace Core\Application\Category\Create;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Create\Contracts\ICreateCategoryInput;

class CreateCategoryRequest implements ICreateCategoryInput
{

    public function __construct(
        private string $name,
        private string $description,
        private bool $isActive = true
    )
    {
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

    public function toEntity(): Category
    {
        return Category::create(
            name: $this->name,
            description: $this->description,
            isActive: $this->isActive
        );
    }
}