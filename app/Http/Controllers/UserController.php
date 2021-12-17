<?php

namespace App\Http\Controllers;

use App\Constants\StatusCode;
use App\Services\UserService;
use App\Http\Requests\User\UserAddRequest;
use App\Http\Requests\User\UserEditRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * 使用者列表
     */
    public function list()
    {
        return response()->ok($this->userService->getUsers());
    }

    /**
     * 單一使用者資料
     */
    public function info($id)
    {
        return response()->ok($this->userService->getUser($id));
    }

    /**
     * 新增使用者
     */
    public function add(UserAddRequest $request)
    {
        $this->userService->addUser($request->validated());

        return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);
    }

    /**
     * 更新使用者
     */
    public function edit(UserEditRequest $request, $id)
    {
        $this->userService->editUser($id, $request->validated());

        return response()->ok(null, __('messages.update_success'), StatusCode::UPDATE_OK);
    }

    /**
     * 刪除使用者
     */
    public function delete($id)
    {
        $this->userService->deleteUserById($id);

        return response()->ok(null, __('messages.delete_success'), StatusCode::DELETE_OK);
    }
}
