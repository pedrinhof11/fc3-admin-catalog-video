<?php

namespace Core\Application\Category\Update;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Update\UpdateCategoryInput;
use Core\Domain\Category\UseCase\Update\UpdateCategoryOutput;

class UpdateCategoryRequest implements UpdateCategoryInput
{

    public function __construct(
        private string $id,
        private string $name,
        private ?string $description = null,
    )
    {
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}