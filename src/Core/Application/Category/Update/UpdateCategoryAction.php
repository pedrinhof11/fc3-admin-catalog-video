<?php

namespace Core\Application\Category\Update;

use Core\Domain\Category\UseCase\Update\UpdateCategoryInput;
use Core\Domain\Category\UseCase\Update\UpdateCategoryOutput;
use Core\Domain\Category\UseCase\Update\UpdateCategoryRepository;
use Core\Domain\Category\UseCase\Update\UpdateCategoryUseCase;

readonly class UpdateCategoryAction implements UpdateCategoryUseCase
{

    public function __construct(private UpdateCategoryRepository $repository)
    {
    }

    public function execute(UpdateCategoryInput $input): UpdateCategoryOutput
    {
        $category = $this->repository->findById($input->getId());

        $category->update(
            name: $input->getName(),
            description: $input->getDescription() ?? $category->getDescription()
        );

        $this->repository->update($category);

        return new UpdateCategoryResponse($category);
    }
}