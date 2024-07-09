<?php

namespace Core\Application\Category\Create;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Create\Contracts\ListCategoriesInput;
use Core\Domain\Category\UseCase\Create\Contracts\ICreateCategoryOutput;

readonly class CreateCategoryResponse implements ICreateCategoryOutput
{

    public function __construct(private Category $category)
    {
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
    public function toArray(): array
    {
        return [
            'id' => $this->category->getId()->getValue(),
            'name' => $this->category->getName(),
            'description' => $this->category->getDescription(),
            'is_active' => $this->category->isActive(),
            'created_at' => $this->category->getCreatedAt(),
            'updated_at' => $this->category->getUpdatedAt(),
        ];
    }
}