<?php

namespace Tests\Unit\Core\Domain\Category\Entity;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Shared\Validator\EntityValidationException;
use Core\Domain\Shared\ValueObject\Uuid;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{

    public function test_create_a_new_category()
    {
        $category = Category::create(
            name: 'Category 1',
            description: 'Category 1 description',
        );

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('Category 1', $category->getName());
        $this->assertEquals('Category 1 description', $category->getDescription());
        $this->assertTrue($category->isActive());
        $this->assertNotNull($category->getCreatedAt());
        $this->assertNotNull($category->getUpdatedAt());
        $this->assertIsString($category->getCreatedAt());
        $this->assertIsString($category->getUpdatedAt());
    }

    public function test_create_a_new_category_with_is_active_false()
    {
        $category = Category::create(
            name: 'Category 1',
            description: 'Category 1 description',
            isActive: false
        );

        $this->assertFalse($category->isActive());
    }

    public function test_from_create_category()
    {
        $id = Uuid::create();
        $name = 'Test Category';
        $description = 'This is a test category';
        $isActive = true;
        $createdAt = new \DateTimeImmutable();
        $updatedAt = new \DateTimeImmutable();

        $category = Category::from($id, $name, $description, $isActive, $createdAt, $updatedAt);

        $this->assertSame($id, $category->getId());
        $this->assertSame($name, $category->getName());
        $this->assertSame($description, $category->getDescription());
        $this->assertSame($isActive, $category->isActive());
        $this->assertSame($createdAt->format('Y-m-d H:i:s'), $category->getCreatedAt());
        $this->assertSame($updatedAt->format('Y-m-d H:i:s'), $category->getUpdatedAt());
    }

    public function testFromConvertsStringDatesToDateTimeImmutable()
    {
        $id = Uuid::create();
        $name = 'Test Category';
        $description = 'This is a test category';
        $isActive = true;
        $createdAt = '2022-01-01 12:00:00';
        $updatedAt = '2022-01-02 12:00:00';

        $category = Category::from($id, $name, $description, $isActive, $createdAt, $updatedAt);

        $this->assertEquals($createdAt, $category->getCreatedAt());
        $this->assertEquals($updatedAt, $category->getUpdatedAt());
    }


    public function test_update_a_category()
    {
        $category = Category::create(
            name: 'Category 1',
            description: 'Category 1 description',
            isActive: true
        );

        $category->update('Category 2', 'Category 2 description');

        $this->assertEquals('Category 2', $category->getName());
        $this->assertEquals('Category 2 description', $category->getDescription());
    }

    public function test_active_a_category()
    {
        $category = Category::create(
            name: 'Category 1',
            description: 'Category 1 description',
            isActive: false
        );

        $category->deactivate();

        $this->assertFalse($category->isActive());
        $category->activate();
        $this->assertTrue($category->isActive());
    }


    public function test_deactivate_a_category()
    {
        $category = Category::create(
            name: 'Category 1',
            description: 'Category 1 description',
        );

        $this->assertTrue($category->isActive());
        $category->deactivate();
        $this->assertFalse($category->isActive());
    }


    public function test_throw_exception_when_name_is_empty()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("'Name' should not be empty");
        Category::create(
            name: '',
            description: 'Category 1 description',
            isActive: true
        );
    }

    public function test_throw_exception_when_name_is_longer_than_45_characters()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("'Name' should not be longer than 45 characters");
        Category::create(
            name: str_repeat('a', 46),
            description: 'Category 1 description',
            isActive: true
        );
    }

    public function test_throw_exception_when_description_is_longer_than_255_characters()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("'Description' should not be longer than 255 characters");
        Category::create(
            name: 'Category 1',
            description: str_repeat('a', 256),
            isActive: true
        );
    }
}
