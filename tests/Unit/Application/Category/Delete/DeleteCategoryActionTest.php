<?php

namespace Tests\Unit\Application\Category\Delete;

use Core\Application\Category\Delete\DeleteCategoryAction;
use Core\Application\Category\Delete\DeleteCategoryRequest;
use Core\Application\Category\Delete\DeleteCategoryResponse;
use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\Delete\DeleteCategoryRepository;
use PHPUnit\Framework\TestCase;

class DeleteCategoryActionTest extends TestCase
{

    public function test_delete_a_category()
    {
        $categoryStub = Category::create('teste', '');
        $id = $categoryStub->getId();

        $repository = $this->createMock(DeleteCategoryRepository::class);

        $repository
            ->expects($this->once())
            ->method('delete')
            ->with($id)
            ->willReturn(true);

        $action = new DeleteCategoryAction($repository);

        $response = $action->execute(new DeleteCategoryRequest($id));

        $this->assertInstanceOf(DeleteCategoryResponse::class, $response);
        $this->assertTrue($response->success());

    }
}