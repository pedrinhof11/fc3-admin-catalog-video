<?php

namespace Core\Application\Category\Delete;

use Core\Domain\Category\UseCase\Delete\DeleteCategoryInput;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryOutput;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryRepository;

class DeleteCategoryResponse implements DeleteCategoryOutput
{
    public function __construct(
        private bool $removed
    )
    {
    }

    public function success(): bool
    {
        return $this->removed;
    }
}