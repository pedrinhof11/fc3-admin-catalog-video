<?php

namespace Core\Domain\Category\UseCase\Create;

use Core\Domain\Category\UseCase\Create\Contracts\ICreateCategoryInput;
use Core\Domain\Category\UseCase\Create\Contracts\ICreateCategoryOutput;

interface CreateCategoryUseCase
{
    public function execute(ICreateCategoryInput $input): ICreateCategoryOutput;
}