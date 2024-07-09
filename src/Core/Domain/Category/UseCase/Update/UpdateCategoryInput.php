<?php

namespace Core\Domain\Category\UseCase\Update;

interface UpdateCategoryInput
{
    public function getId(): string;
    public function getName(): string;

    public function getDescription(): string|null;
}