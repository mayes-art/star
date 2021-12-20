<?php

namespace App\Services;

use App\Http\Resources\Role\RoleListCollection;
//use App\Http\Resources\Role\RoleListResource;
use App\Http\Resources\Role\RoleListResource;
use App\Http\Resources\Role\RoleResource;
use App\Repositories\RoleRepository;
use App\Traits\Pagination;

class RoleService
{
    use Pagination;

    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function addRole($data)
    {
        return $this->roleRepository->createRole($data);
    }

    public function getRoles()
    {
        return $this->formatterResource(
            $this->roleRepository->getList(),
            RoleListResource::class
        );
    }

    public function detail($id)
    {
        return $this->roleRepository->getOne($id);
    }

    public function editRole($id, $data)
    {
        return $this->roleRepository->updateRole($id, $data);
    }
}
