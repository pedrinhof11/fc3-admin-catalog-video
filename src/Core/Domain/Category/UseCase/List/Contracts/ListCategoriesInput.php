<?php

namespace Core\Domain\Category\UseCase\List\Contracts;

use Core\Domain\Category\Entity\Category;

interface ListCategoriesInput
{
    public function getName(): string;
    public function getOrder(): string;
    public function getPage(): int;
    public function getPerPage(): int;
}