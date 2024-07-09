<?php

namespace Core\Domain\Category\UseCase\Create\Contracts;

interface ICreateCategoryOutput
{

    public function toArray(): array;
}