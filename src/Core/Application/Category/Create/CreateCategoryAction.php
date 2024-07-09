<?php

namespace Core\Application\Category\Create;

use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryRepository;
use Core\Domain\Category\UseCase\Create\Contracts\ICreateCategoryInput;
use Core\Domain\Category\UseCase\Create\Contracts\ICreateCategoryOutput;
use Core\Domain\Category\UseCase\Create\CreateCategoryUseCase;

class CreateCategoryAction implements CreateCategoryUseCase
{
    public function __construct(
        private CreateCategoryRepository $repository
    )
    {
    }

    public function execute(ICreateCategoryInput $input): ICreateCategoryOutput
    {
        $category = $this->repository->create($input->toEntity());
        return new CreateCategoryResponse($category);
    }
}