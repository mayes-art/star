<?php

namespace App\Services;

use App\Http\Resources\Role\RoleListResource;
use App\Repositories\RoleRepository;

class RoleService
{
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
        return RoleListResource::collection($this->roleRepository->getList());
    }
}
