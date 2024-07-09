<?php

namespace Tests\Unit\Application\Category\Update;

use Core\Application\Category\Update\UpdateCategoryAction;
use Core\Application\Category\Update\UpdateCategoryRequest;
use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Update\UpdateCategoryOutput;
use Core\Domain\Category\UseCase\Update\UpdateCategoryRepository;
use Core\Domain\Shared\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class UpdateCategoryActionTest extends TestCase
{

    public function test_execute_rename_a_category()
    {

        $expectedName = 'Category 1 Renamed';

        $categoryStub = Category::create(
            name: "Category",
            description: "description",
        );

        $expectedId = $categoryStub->getId();

        $repositoryMock = $this->createMock(UpdateCategoryRepository::class);

        $repositoryMock
            ->expects($this->once())
            ->method('findById')
            ->willReturn($categoryStub);


        $repositoryMock
            ->expects($this->once())
            ->method('update')
            ->with($categoryStub);

        $input = new UpdateCategoryRequest(
            id: $expectedId,
            name: $expectedName
        );

        $action = new UpdateCategoryAction($repositoryMock);
        $response = $action->execute($input);

        $this->assertInstanceOf(UpdateCategoryOutput::class, $response);
        $this->assertEquals($response->getId(), $expectedId);
        $this->assertEquals($response->getName(), $expectedName);
        $this->assertEquals($response->getDescription(), $categoryStub->getDescription());
        $this->assertTrue($response->isActive());
        $this->assertEquals($response->getCreatedAt(), $categoryStub->getCreatedAt());
    }

    public function test_execute_rename_and_description_a_category()
    {

        $expectedName = 'Category 1 Renamed';
        $expectedDescription = 'Category description Renamed';

        $categoryStub = Category::create(
            name: "Category",
            description: "description",
        );

        $expectedId = $categoryStub->getId();

        $repositoryMock = $this->createMock(UpdateCategoryRepository::class);

        $repositoryMock
            ->expects($this->once())
            ->method('findById')
            ->willReturn($categoryStub);


        $repositoryMock
            ->expects($this->once())
            ->method('update')
            ->with($categoryStub);

        $input = new UpdateCategoryRequest(
            id: $expectedId,
            name: $expectedName,
            description: $expectedDescription
        );

        $action = new UpdateCategoryAction($repositoryMock);
        $response = $action->execute($input);

        $this->assertInstanceOf(UpdateCategoryOutput::class, $response);
        $this->assertEquals($response->getId(), $expectedId);
        $this->assertEquals($response->getName(), $expectedName);
        $this->assertEquals($response->getDescription(), $expectedDescription);
        $this->assertTrue($response->isActive());
        $this->assertEquals($response->getCreatedAt(), $categoryStub->getCreatedAt());
    }
}