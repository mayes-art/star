<?php

namespace App\Repositories;

use App\Models\Item;
use App\Constants\ItemConst;
use App\Constants\Pagination;

class ItemRepository extends BaseRepository
{
    protected $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function createItem($data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->paginate(Pagination::ITEM);
    }

    public function getOneById($id)
    {
        return $this->model->find($id);
    }

    public function deleteItem($id)
    {
        return $this->model->where('id', $id)->update([
            'is_delete' => ItemConst::DELETE,
            'deleted_at' => now(),
        ]);
    }

    public function editItem($id, $params)
    {
        return $this->model->find($id)->update($params);
    }
}
