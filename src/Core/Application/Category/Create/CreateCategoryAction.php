<?php

namespace Core\Application\Category\Create;

use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryOutput;
use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryRepository;
use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryInput;
use Core\Domain\Category\UseCase\Create\CreateCategoryUseCase;

class CreateCategoryAction implements CreateCategoryUseCase
{
    public function __construct(
        private CreateCategoryRepository $repository
    )
    {
    }

    public function execute(CreateCategoryInput $input): CreateCategoryOutput
    {
        $category = $this->repository->create($input->toEntity());
        return new CreateCategoryResponse($category);
    }
}