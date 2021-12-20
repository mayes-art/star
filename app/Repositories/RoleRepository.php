<?php

namespace App\Repositories;

use App\Constants\Pagination;
use App\Models\Role;

class RoleRepository extends BaseRepository
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function createRole($data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->paginate(Pagination::ROLE);
    }

    public function getOne($id)
    {
        return $this->model->find($id);
    }

    public function updateRole($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
}
