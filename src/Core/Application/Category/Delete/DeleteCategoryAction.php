<?php

namespace Core\Application\Category\Delete;

use Core\Domain\Category\UseCase\Delete\DeleteCategoryInput;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryRepository;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryUseCase;

class DeleteCategoryAction implements DeleteCategoryUseCase
{
    public function __construct(
        private DeleteCategoryRepository $repository
    )
    {
    }

    public function execute(DeleteCategoryInput $input)
    {
        $this->repository->delete($input->getId());
    }
}