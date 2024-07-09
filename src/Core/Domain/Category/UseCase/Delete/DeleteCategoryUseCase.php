<?php

namespace Core\Domain\Category\UseCase\Delete;

interface DeleteCategoryUseCase
{
    public function execute(DeleteCategoryInput $input);
}