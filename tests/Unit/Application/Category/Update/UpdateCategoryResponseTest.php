<?php

namespace Tests\Unit\Application\Category\Update;

use Core\Application\Category\Update\UpdateCategoryResponse;
use Core\Domain\Category\Entity\Category;
use PHPUnit\Framework\TestCase;

class UpdateCategoryResponseTest extends TestCase
{

    public function testToArray()
    {
        $data = Category::create('Test Category', 'This is a test description');

        $response = new UpdateCategoryResponse($data);
        $result = $response->toArray();

        $this->assertEquals($data->getId()->getValue(), $result['id']);
        $this->assertEquals('Test Category', $result['name']);
        $this->assertEquals('This is a test description', $result['description']);
        $this->assertTrue($result['is_active']);
        $this->assertEquals($data->getCreatedAt(), $result['created_at']);
        $this->assertEquals($data->getUpdatedAt(), $result['updated_at']);

    }
}