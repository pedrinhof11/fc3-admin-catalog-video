<?php

namespace Core\Domain\Shared\Contracts;

interface Pagination
{
    public function items(): array;
    public function total(): int;
    public function page(): int;
    public function firstPage(): int;
    public function lastPage(): int;
    public function perPage(): int;

    public function hasNext(): bool;
}