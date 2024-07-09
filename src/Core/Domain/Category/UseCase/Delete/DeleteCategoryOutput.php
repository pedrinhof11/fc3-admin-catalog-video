<?php

namespace Core\Domain\Category\UseCase\Delete;

interface DeleteCategoryOutput
{
    public function success(): bool;
}