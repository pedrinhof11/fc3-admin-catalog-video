<?php

namespace Core\Domain\Category\UseCase\Update;

use Core\Domain\Category\Entity\Category;

interface UpdateCategoryOutput
{
    public function getId(): string;
    public function getName(): string;
    public function getDescription(): string;
    public function isActive(): bool;
    public function getUpdatedAt(): string;
    public function getCreatedAt(): string;
    public function toArray(): array;
}