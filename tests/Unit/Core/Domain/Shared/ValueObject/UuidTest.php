<?php

namespace Tests\Unit\Core\Domain\Shared\ValueObject;

use Core\Domain\Shared\ValueObject\InvalidUuidException;
use Core\Domain\Shared\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{

    public function test_create_a_uuid()
    {
        $uuid = Uuid::create();
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertIsString($uuid->__toString());
        $this->assertIsString($uuid->getValue());
    }

    public function test_create_a_uuid_valid_from()
    {
        $expectedUuid = '1c587a17-f47b-41a8-9065-0f234498f0a5';
        $uuid = Uuid::from($expectedUuid);
        $this->assertEquals($expectedUuid, $uuid->getValue());
    }

    public function test_throw_exception_when_invalid_from()
    {
        $InvalidUuid = '1c587a17-f47b-41a8-9065-0a5';
        $this->expectException(InvalidUuidException::class);
        $this->expectExceptionMessage('"1c587a17-f47b-41a8-9065-0a5" is not a valid UUID');

        Uuid::from($InvalidUuid);
    }
}
