<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
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
        if ($this->userService->addUser($request->validated())) {
            return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);

        }

        return response()->ok(null, __('messages.create_fail'), StatusCode::CREATE_FAIL);
    }

    /**
     * 更新使用者
     */
    public function edit(UserEditRequest $request)
    {
        $params = $request->validated();

        if ($this->userService->editUser($params['id'], Arr::except($params, 'id'))) {
            return response()->ok(null, __('messages.update_success'), StatusCode::UPDATE_OK);
        }

        return response()->fail(null, __('messages.update_fail'), StatusCode::UPDATE_FAIL);
    }

    /**
     * 刪除使用者
     */
    public function delete($id)
    {
        if ($this->userService->deleteUserById($id)) {
            return response()->ok(null, __('messages.delete_success'), StatusCode::DELETE_OK);
        }

        return response()->fail(null, __('messages.delete_fail'), StatusCode::DELETE_FAIL);
    }
}
