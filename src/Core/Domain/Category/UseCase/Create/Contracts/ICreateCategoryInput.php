<?php

namespace Core\Domain\Category\UseCase\Create\Contracts;

use Core\Domain\Category\Entity\Category;

interface ICreateCategoryInput
{
    public function getName(): string;
    public function getDescription(): string;
    public function isActive(): bool;

    public function toEntity(): Category;
}