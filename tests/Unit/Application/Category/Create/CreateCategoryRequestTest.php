<?php

namespace Tests\Unit\Application\Category\Create;

use Core\Application\Category\Create\CreateCategoryRequest;
use Core\Domain\Category\Entity\Category;
use PHPUnit\Framework\TestCase;

class CreateCategoryRequestTest extends TestCase
{
    public function test_create_category_request_can_be_created_with_valid_data()
    {
        $request = new CreateCategoryRequest('Test Category', 'This is a test category', true);
        $this->assertEquals('Test Category', $request->getName());
        $this->assertEquals('This is a test category', $request->getDescription());
        $this->assertTrue($request->isActive());
    }

    public function test_create_category_request_can_be_created_with_default_values()
    {
        $request = new CreateCategoryRequest('Test Category');
        $this->assertEquals('Test Category', $request->getName());
        $this->assertEquals('', $request->getDescription());
        $this->assertTrue($request->isActive());
    }

    public function test_create_category_request_can_be_created_with_optional_values()
    {
        $request = new CreateCategoryRequest('Test Category', 'This is a test category', false);
        $this->assertEquals('Test Category', $request->getName());
        $this->assertEquals('This is a test category', $request->getDescription());
        $this->assertFalse($request->isActive());
    }

    public function test_to_entity_create_category()
    {
        $name = 'Test Category';
        $description = 'Test Description';
        $isActive = false;

        $createCategoryRequest = new CreateCategoryRequest($name, $description, $isActive);
        $category = $createCategoryRequest->toEntity();

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($name, $category->getName());
        $this->assertEquals($description, $category->getDescription());
        $this->assertEquals($isActive, $category->isActive());
    }
}
