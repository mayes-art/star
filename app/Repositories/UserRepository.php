<?php

namespace App\Repositories;

use App\Models\User;
use App\Constants\Pagination;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser($data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->paginate(Pagination::USER);
    }

    public function getOneById($id)
    {
        return $this->model->find($id);
    }

    public function deleteUser($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function editUser($id, $params)
    {
        return $this->model->find($id)->update($params);
    }
}
