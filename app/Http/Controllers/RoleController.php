<?php

namespace App\Http\Controllers;

use App\Constants\StatusCode;
use App\Http\Requests\Role\RoleAddRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * 角色列表
     */
    public function list()
    {
        return response()->ok($this->roleService->getRoles());
    }

    /**
     * 新增角色
     */
    public function add(RoleAddRequest $request)
    {
        $this->roleService->addRole($request->validated());

        return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);
    }

    /**
     * 更新角色
     */
    public function edit($id)
    {
        // TODO 更新角色
        return response()->ok($id);
    }

    /**
     * 刪除角色
     */
    public function delete($id)
    {
        // TODO 刪除角色
        return response()->ok($id);
    }
}
