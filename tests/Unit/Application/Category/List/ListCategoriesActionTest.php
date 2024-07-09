<?php

namespace Tests\Unit\Application\Category\List;


use Core\Application\Category\List\ListCategoriesAction;
use Core\Domain\Category\Entity\Category;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesInput;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesOutput;
use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesRepository;
use Core\Domain\Shared\Contracts\Pagination;
use PHPUnit\Framework\TestCase;

class ListCategoriesActionTest extends TestCase
{
    public function test_execute_list_categories_empty()
    {
        $paginationMock = $this
            ->createConfiguredMock(Pagination::class, [
                'items' => [],
                'total' => 0,
            ]);

        $repositoryMock = $this
            ->createMock(ListCategoriesRepository::class);

        $repositoryMock->expects($this->once())
            ->method('findAllByName')
            ->willReturn($paginationMock);

        $input = $this->createConfiguredMock(ListCategoriesInput::class, [
            'getName' => '',
            'getOrder' => 'desc',
            'getPage' => 1,
            'getPerPage' => 15
        ]);

        $action = new ListCategoriesAction($repositoryMock);

        $output = $action->execute($input);

        $this->assertInstanceOf(ListCategoriesOutput::class, $output);
        $this->assertCount(0, $output->data()->items());
        $this->assertEmpty($output->data()->total());

    }

    public function test_execute_list_categories_1_item()
    {

        $categories = $this->factoryCreateCategories(1);

        $paginationMock = $this
            ->createConfiguredMock(Pagination::class, [
                'items' => $categories,
                'total' => 1,
                'page' => 1,
                'firstPage' => 1,
                'lastPage' => 1,
                'perPage' => 15,
                'hasNext' => false
            ]);

        $repositoryMock = $this
            ->createMock(ListCategoriesRepository::class);

        $repositoryMock->expects($this->once())
            ->method('findAllByName')
            ->willReturn($paginationMock);

        $input = $this->createConfiguredMock(ListCategoriesInput::class, [
            'getName' => '',
            'getOrder' => 'desc',
            'getPage' => 1,
            'getPerPage' => 15
        ]);

        $action = new ListCategoriesAction($repositoryMock);

        $output = $action->execute($input);

        $this->assertInstanceOf(ListCategoriesOutput::class, $output);
        $this->assertCount(1, $output->data()->items());
        $this->assertEquals(1, $output->data()->total());
        $this->assertEquals(1, $output->data()->page());
        $this->assertEquals(15, $output->data()->perPage());
        $this->assertFalse($output->data()->hasNext());
    }

    private function factoryCreateCategories(int $quantity = 1): array
    {
        $categories = [];
        for ($i = 0; $i < $quantity; $i++) {
            $categories[] = Category::create(
                name: 'Category ' . $i,
                description: 'Category ' . $i . ' description',
            );
        }

        return $categories;
    }

}