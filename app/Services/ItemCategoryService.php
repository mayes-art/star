<?php

namespace App\Services;

use App\Http\Resources\ItemCategory\ItemCategoryResource;
use App\Repositories\ItemCategoryRepository;
use App\Traits\Pagination;

class ItemCategoryService
{
    use Pagination;

    protected $itemCategoryRepository;

    public function __construct(ItemCategoryRepository $itemCategoryRepository)
    {
        $this->itemCategoryRepository = $itemCategoryRepository;
    }

    public function getItemCategories()
    {
        // return ItemCategoryResource::collection($this->itemCategoryRepository->getList());
        return $this->formatterResource(
            $this->itemCategoryRepository->getList(),
            ItemCategoryResource::class
        );
    }

    public function addItemCategory($data)
    {
        return $this->itemCategoryRepository->createItemCategory($data);
    }

    public function editItemCategory($id, $params)
    {
        return $this->itemCategoryRepository->editItemCategory($id, $params);
    }

    public function deleteItemCategoryById($id)
    {
        return $this->itemCategoryRepository->deleteItemCategory($id);
    }
}
