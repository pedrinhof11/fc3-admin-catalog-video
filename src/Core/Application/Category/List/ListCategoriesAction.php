<?php

namespace Core\Application\Category\List;

use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesInput;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesOutput;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesRepository;
use Core\Domain\Category\UseCase\List\ListCategoriesUseCase;

class ListCategoriesAction implements ListCategoriesUseCase
{
    public function __construct(
        private ListCategoriesRepository $repository
    )
    {
    }

    public function execute(ListCategoriesInput $input): ListCategoriesOutput
    {

        $pagination = $this->repository->findAllByName(
            name: $input->getName(),
            order: $input->getOrder(),
            page: $input->getPage(),
            perPage: $input->getPerPage()
        );

        return new ListCategoriesResponse($pagination);
    }
}