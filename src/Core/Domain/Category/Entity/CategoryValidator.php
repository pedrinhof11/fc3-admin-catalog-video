<?php

namespace Core\Domain\Category\Entity;

use Core\Domain\Shared\Validator\EntityValidation;
use Core\Domain\Shared\Validator\EntityValidator;

class CategoryValidator extends EntityValidator
{

    public function __construct(
        private Category $category
    ) {
    }

    public function handle(): void
    {
        EntityValidation::notNull($this->category->getName(), "'Name' should not be null");
        EntityValidation::notEmpty($this->category->getName(), "'Name' should not be empty");
        EntityValidation::maxLength($this->category->getName(), 45, "'Name' should not be longer than 45 characters");

        EntityValidation::maxLength($this->category->getDescription(), 255, "'Description' should not be longer than 255 characters");

    }
}