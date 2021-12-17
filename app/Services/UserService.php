<?php

namespace App\Services;

use App\Http\Resources\User\UserResource;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        return UserResource::collection($this->userRepository->getList());
    }

    public function getUser($id)
    {
        return new UserResource($this->userRepository->getOneById($id));
    }

    public function addUser($data)
    {
        return $this->userRepository->createUser($data);
    }

    public function editUser($id, $params)
    {
        return $this->userRepository->editUser($id, $params);
    }

    public function deleteUserById($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
