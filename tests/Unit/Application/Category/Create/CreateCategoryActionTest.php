<?php

namespace Tests\Unit\Application\Category\Create;

use Core\Application\Category\Create\CreateCategoryAction;
use Core\Application\Category\Create\CreateCategoryRequest;
use Core\Application\Category\Create\CreateCategoryResponse;
use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Create\Contracts\CreateCategoryRepository;
use PHPUnit\Framework\TestCase;

class CreateCategoryActionTest extends TestCase
{
    public function test_create_a_new_category()
    {
        $expectedName = 'Category 1';
        $expectedDescription = 'Category 1 description';

        $expectedCategory = Category::create(
            name: $expectedName,
            description: $expectedDescription,
        );

        $repositoryMock = $this->createMock(CreateCategoryRepository::class);

        $repositoryMock->expects($this->once())
            ->method('create')
            ->willReturn($expectedCategory);

        $action = new CreateCategoryAction($repositoryMock);

        $input = new CreateCategoryRequest(
            name: $expectedName,
            description: $expectedDescription,
        );

        $output = $action->execute($input);

        $this->assertInstanceOf(CreateCategoryResponse::class, $output);
        $this->assertNotNull($output->id());
        $this->assertEquals($expectedName, $output->name());
        $this->assertEquals($expectedDescription, $output->description());
        $this->assertTrue($output->isActive());
        $this->assertEquals($expectedCategory->getCreatedAt(), $output->createdAt());
        $this->assertEquals($expectedCategory->getUpdatedAt(), $output->updatedAt());

        
    }

}