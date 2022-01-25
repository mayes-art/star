<?php

namespace App\Repositories;

use App\Models\ItemCategory;
use App\Constants\Pagination;

class ItemCategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct(ItemCategory $model)
    {
        $this->model = $model;
    }

    public function createItemCategory($data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->paginate(Pagination::ITEMCATEGORY);
    }

    public function deleteItemCategory($id)
    {
        return $this->model->find($id)->delete();
    }

    public function editItemCategory($id, $params)
    {
        return $this->model->find($id)->update($params);
    }
}
