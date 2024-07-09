<?php

namespace Core\Domain\Shared\Validator;

class EntityValidation
{
    public static function notNull(mixed $value, string $message = 'should not be null'): void
    {
        if ($value === null)
            throw new EntityValidationException($message);
    }

    public static function notEmpty(mixed $value, string $message = 'should not be empty'): void
    {
        if (empty($value))
            throw new EntityValidationException($message);
    }

    public static function maxLength(mixed $value, int $length, string $message = 'should not be longer than %d characters'): void
    {
        if (!empty($value) && strlen($value) > $length)
            throw new EntityValidationException(sprintf($message, $length));
    }

    public static function minLength(mixed $value, int $length, string $message = 'should not be shorter than %d characters'): void
    {
        if (!empty($value) && strlen($value) < $length)
            throw new EntityValidationException(sprintf($message, $length));
    }
}