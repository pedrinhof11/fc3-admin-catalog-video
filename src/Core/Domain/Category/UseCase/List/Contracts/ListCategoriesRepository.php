<?php

namespace Core\Domain\Category\UseCase\List\Contracts;

use Core\Domain\Shared\Contracts\Pagination;

interface ListCategoriesRepository
{
    public function findAllByName(
        string $name = '',
        string $order = 'desc',
        int $page = 1,
        int $perPage = 15
    ): Pagination;
}