<?php

namespace Core\Application\Category\Delete;

use Core\Domain\Category\UseCase\Delete\DeleteCategoryInput;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryRepository;

class DeleteCategoryRequest implements DeleteCategoryInput
{
    public function __construct(
        public string $id
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}