<?php

namespace App\Repositories;

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
        return $this->model->all();
    }
}
