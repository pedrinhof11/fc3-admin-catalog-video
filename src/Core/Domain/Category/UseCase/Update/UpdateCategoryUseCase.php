<?php

namespace Core\Domain\Category\UseCase\Update;

interface UpdateCategoryUseCase
{
    public function execute(UpdateCategoryInput $input): UpdateCategoryOutput;
}