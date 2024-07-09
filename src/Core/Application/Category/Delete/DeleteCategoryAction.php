<?php

namespace Core\Application\Category\Delete;

use Core\Domain\Category\UseCase\Delete\DeleteCategoryInput;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryOutput;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryRepository;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryUseCase;
use PHPUnit\Event\Code\Throwable;

class DeleteCategoryAction implements DeleteCategoryUseCase
{
    public function __construct(
        private DeleteCategoryRepository $repository
    )
    {
    }

    public function execute(DeleteCategoryInput $input): DeleteCategoryOutput
    {
        $removed = $this->repository->delete($input->getId());

        return new DeleteCategoryResponse($removed);
    }
}