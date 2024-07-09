<?php

namespace Core\Application\Category\List;

use Core\Domain\Category\UseCase\List\Contracts\ListCategoriesOutput;
use Core\Domain\Shared\Contracts\Pagination;

class ListCategoriesResponse implements ListCategoriesOutput
{
    public function __construct(
        private Pagination $data
    )
    {
    }

    public function data(): Pagination
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [
            'items' => $this->data()->items(),
            'total' => $this->data()->total(),
            'page' => $this->data()->page(),
            'firstPage' => $this->data()->firstPage(),
            'lastPage' => $this->data()->lastPage(),
            'perPage' => $this->data()->perPage(),
            'hasNext' => $this->data()->hasNext()
        ];
    }

}