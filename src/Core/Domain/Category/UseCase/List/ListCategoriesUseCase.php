<?php

namespace Core\Domain\Category\UseCase\List;

use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesInput;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesOutput;

interface ListCategoriesUseCase
{

    public function execute(ListCategoriesInput $input): ListCategoriesOutput;
}