<?php

namespace Core\Domain\Category\UseCase\Delete;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Shared\ValueObject\Uuid;

interface DeleteCategoryRepository
{
    public function delete(string $id): void;

}