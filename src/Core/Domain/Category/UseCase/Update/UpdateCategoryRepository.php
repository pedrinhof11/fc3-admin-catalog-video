<?php

namespace Core\Domain\Category\UseCase\Update;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Shared\ValueObject\Uuid;

interface UpdateCategoryRepository
{
    public function update(Category $category): Category;
    public function findById(string $id): Category;
}