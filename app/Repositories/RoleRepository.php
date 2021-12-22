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

    public function createRole(array $data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->paginate(Pagination::ROLE);
    }

    public function getOne(int $id)
    {
        return $this->model->find($id);
    }

    public function updateRole(int $id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function deleteRole(int $id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
