<?php

namespace App\Http\Controllers;

use App\Constants\StatusCode;
use App\Http\Requests\Role\RoleAddRequest;
use App\Http\Requests\Role\RoleEditRequest;
use App\Http\Requests\Role\RoleListRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

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
    public function list(RoleListRequest $request)
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
    public function edit(RoleEditRequest $request)
    {
        $data = $request->validated();

        if($this->roleService->editRole($data['role_id'], Arr::except($data, 'role_id'))) {
            return response()->ok();
        }

        return response()->fail();
    }

    /**
     * 刪除角色
     */
    public function delete($id)
    {
        if(!$this->roleService->detail($id)) {
            return response()->fail();
        }

        return response()->ok($this->roleService->deleteRole($id));
    }
}
