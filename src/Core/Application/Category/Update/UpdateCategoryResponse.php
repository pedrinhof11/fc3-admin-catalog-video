<?php

namespace Core\Application\Category\Update;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Update\UpdateCategoryOutput;

class UpdateCategoryResponse implements UpdateCategoryOutput
{
    public function __construct(
        private Category $data
    )
    {

    }

    public function getId(): string
    {
        return $this->data->getId();
    }

    public function getName(): string
    {
        return $this->data->getName();
    }

    public function getDescription(): string
    {
        return $this->data->getDescription();
    }

    public function isActive(): bool
    {
        return $this->data->isActive();
    }

    public function getCreatedAt(): string
    {
        return $this->data->getCreatedAt();
    }

    public function getUpdatedAt(): string
    {
        return $this->data->getUpdatedAt();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->data->getId()->getValue(),
            'name' => $this->data->getName(),
            'description' => $this->data->getDescription(),
            'is_active' => $this->data->isActive(),
            'created_at' => $this->data->getCreatedAt(),
            'updated_at' => $this->data->getUpdatedAt(),
        ];
    }


}