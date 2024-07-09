<?php

namespace Core\Application\Category\Create;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryOutput;


readonly class CreateCategoryResponse implements CreateCategoryOutput
{

    public function __construct(private Category $data)
    {
    }

    public function id(): string
    {
       return $this->data->getId()->getValue();
    }

    public function name(): string
    {
        return $this->data->getName();
    }

    public function description(): string
    {
        return $this->data->getDescription();
    }

    public function isActive(): bool
    {
        return $this->data->isActive();
    }

    public function createdAt(): string
    {
        return $this->data->getCreatedAt();
    }

    public function updatedAt(): string
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