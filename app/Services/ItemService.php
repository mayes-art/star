<?php

namespace App\Services;

use App\Http\Resources\Item\ItemResource;
use App\Repositories\ItemRepository;
use App\Traits\Pagination;

class ItemService
{
    use Pagination;

    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getItems()
    {
        return $this->formatterResource(
            $this->itemRepository->getList(),
            ItemResource::class
        );
    }

    public function getItem($id)
    {
        return new ItemResource($this->itemRepository->getOneById($id));
    }

    public function addItem($data)
    {
        return $this->itemRepository->createItem($data);
    }

    public function editItem($id, $params)
    {
        return $this->itemRepository->editItem($id, $params);
    }

    public function deleteItemById($id)
    {
        return $this->itemRepository->deleteItem($id);
    }
}
