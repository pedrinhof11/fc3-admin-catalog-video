<?php

namespace Core\Domain\Category\UseCase\List\Contracts;

use Core\Domain\Shared\Contracts\Pagination;

interface ListCategoriesOutput
{

    public function data(): Pagination;
    public function toArray(): array;
}