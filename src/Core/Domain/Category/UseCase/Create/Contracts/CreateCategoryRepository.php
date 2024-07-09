<?php

namespace Core\Domain\Category\UseCase\Create\Contracts;

use Core\Domain\Category\Entity\Category;

interface CreateCategoryRepository
{
    public function create(Category $category): Category;
}