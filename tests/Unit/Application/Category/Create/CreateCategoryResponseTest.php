<?php

namespace Tests\Unit\Application\Category\Create;

use Core\Application\Category\Create\CreateCategoryResponse;
use Core\Domain\Category\Entity\Category;
use PHPUnit\Framework\TestCase;

class CreateCategoryResponseTest extends TestCase
{
    public function test_to_array()
    {
        $category = Category::create('teste 1', 'this is a description');
        $createCategoryResponse = new CreateCategoryResponse($category); // Assuming CreateCategoryResponse class is properly instantiated

        $result = $createCategoryResponse->toArray();

        $this->assertEquals($category->getId(), $result['id']);
        $this->assertEquals($category->getName(), $result['name']);
        $this->assertEquals($category->getDescription(), $result['description']);
        $this->assertEquals($category->isActive(), $result['is_active']);
        $this->assertEquals($category->getCreatedAt(), $result['created_at']);
        $this->assertEquals($category->getUpdatedAt(), $result['updated_at']);

    }
}
