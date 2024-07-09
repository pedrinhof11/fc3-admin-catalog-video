<?php

namespace Tests\Unit\Core\Domain\Shared\Validator;

use Core\Domain\Shared\Validator\EntityValidation;
use Core\Domain\Shared\Validator\EntityValidationException;
use PHPUnit\Framework\TestCase;

class EntityValidationTest extends TestCase
{

    public function test_not_null()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('should not be null');
        EntityValidation::notNull(null);
    }

    public function test_not_empty()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('should not be empty');
        EntityValidation::notEmpty('');
    }

    public function test_max_length()
    {
        EntityValidation::maxLength(null, 3);
        EntityValidation::maxLength('', 3);

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('should not be longer than 255 characters');
        EntityValidation::maxLength(str_repeat('a', 256), 255);
    }

    public function test_min_length()
    {
        EntityValidation::minLength(null, 3);
        EntityValidation::minLength('', 3);

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('should not be shorter than 3 characters');
        EntityValidation::minLength('a', 3);

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('should not be shorter than 3 characters');
        EntityValidation::minLength('ab', 3);
    }

}
