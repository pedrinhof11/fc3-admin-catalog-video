<?php

namespace Core\Domain\Category\UseCase\Create\Contracts;

interface CreateCategoryOutput
{
    public function id(): string;
    public function name(): string;
    public function description(): string;
    public function isActive(): bool;
    public function createdAt(): string;
    public function updatedAt(): string;
    public function toArray(): array;
}