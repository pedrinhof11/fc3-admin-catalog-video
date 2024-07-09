<?php

namespace Core\Domain\Category\Repository;

use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryRepository;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesRepository;
use Core\Domain\Category\UseCase\Update\UpdateCategoryRepository;

interface CategoryRepository extends
    CreateCategoryRepository,
    ListCategoriesRepository,
    UpdateCategoryRepository
{
}