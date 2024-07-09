<?php

namespace Tests\Unit\Core\Domain\Category\Entity;

use Core\Domain\Category\Entity\Category;
use Core\Domain\Shared\Validator\EntityValidationException;
use Core\Domain\Shared\ValueObject\Uuid;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
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

    public function test_create_a_new_category_from()
    {
        $id = Uuid::create();
        $now = new \DateTimeImmutable();

        $category = Category::from(
            id: $id,
            name: 'Category 1',
            description: 'Category 1 description',
            isActive: true,
            createdAt: $now,
            updatedAt: $now
        );

        $this->assertEquals($id, $category->getId());
        $this->assertEquals("$id", $category->getId()->getValue());
        $this->assertEquals($now->format('Y-m-d H:i:s'), $category->getCreatedAt());
        $this->assertEquals($now->format('Y-m-d H:i:s'), $category->getUpdatedAt());
        $this->assertEquals('Category 1', $category->getName());
        $this->assertEquals('Category 1 description', $category->getDescription());
        $this->assertTrue($category->isActive());
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
