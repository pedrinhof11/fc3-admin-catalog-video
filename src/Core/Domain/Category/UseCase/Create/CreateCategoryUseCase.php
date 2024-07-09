<?php

namespace Core\Domain\Category\UseCase\Create;

use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryInput;
use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryOutput;

interface CreateCategoryUseCase
{
    public function execute(CreateCategoryInput $input): CreateCategoryOutput;
}