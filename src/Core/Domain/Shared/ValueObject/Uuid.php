<?php

namespace Core\Domain\Shared\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid extends ValueObject
{

    private function __construct(protected string $value)
    {
        $this->ensureIsValid();
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function create(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }
    public static function from(string $value): self
    {
        return new self($value);
    }

    private function ensureIsValid(): void
    {
        if (!filter_var($this->value, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-f0-9]{8}-[a-f0-9]{4}-4[a-f0-9]{3}-[89aAbB][a-f0-9]{3}-[a-f0-9]{12}$/']]))
            throw new InvalidUuidException(sprintf('"%s" is not a valid UUID', $this->value));
    }

    public function __toString(): string
    {
        return $this->value;
    }

}