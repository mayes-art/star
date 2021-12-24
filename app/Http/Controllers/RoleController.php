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
     * @api {post} /role/list 角色列表
     * @apiName RoleList
     * @apiGroup Role
     *
     * @apiParam {Integer} page 頁碼
     * @apiParam {Integer} count 筆數
     *
     * @apiParamExample {json} Request-Example:
     * {
     *       "page": 1,
     *       "count": 15
     * }
     *
     * @apiSuccess {Object} data
     * @apiSuccess {Integer} data.id 角色ID
     * @apiSuccess {String} data.name 角色名稱
     * @apiSuccess {Array} data.permission 權限(全開為"*")
     * @apiSuccess {String} data.created_at 新增時間
     * @apiSuccess {String} data.updated_at 更新時間
     *
     * @apiSuccess {Object} pagination
     * @apiSuccess {Integer} pagination.total 總筆數
     * @apiSuccess {Integer} pagination.per_page 每頁筆數
     * @apiSuccess {Integer} pagination.current 目前頁碼
     * @apiSuccess {Integer} pagination.pages 總頁數
     *
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     *{
     *   "status": 1,
     *   "message": "ok",
     *   "data": {
     *       "data": [
     *           {
     *               "id": "1",
     *               "name": "superadmin",
     *               "permission": "*",
     *               "created_at": "2021-12-16 10:21:18",
     *               "updated_at": "2021-12-16 10:21:18"
     *           },
     *           {
     *               "id": "2",
     *               "name": "jun_admin",
     *               "permission": [
     *                   "1-1-1",
     *                   "1-1-2",
     *                   "1-1-3",
     *                   "2-1-1"
     *               ],
     *               "created_at": "2021-12-20 06:05:39",
     *               "updated_at": "2021-12-20 06:05:39"
     *           }
     *       ],
     *      "pagination": {
     *           "total": 1,
     *           "per_page": 10,
     *           "current": 1,
     *           "pages": 1
     *       }
     *   }
     *}
     *
     */
    public function list(RoleListRequest $request)
    {
        return response()->ok($this->roleService->getRoles());
    }

    /**
     * 新增角色
     * @api {post} /role/add 新增角色
     * @apiName RoleAdd
     * @apiGroup Role
     *
     * @apiParam {String} name 角色名稱
     * @apiParam {Array} permission 權限
     *
     * @apiParamExample {json} Request-Example:
     * {
     *       "name": "管理員",
     *       "permission": [
     *          "1-1-1",
     *          "1-1-2",
     *          "2-1-1"
     *       ]
     * }
     *
     */
    public function add(RoleAddRequest $request)
    {
        $this->roleService->addRole($request->validated());

        return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);
    }

    /**
     * @api {put} /role/edit 更新角色
     * @apiName RoleEdit
     * @apiGroup Role
     *
     * @apiParam {Integer} role_id 角色名稱
     * @apiParam {String} name 角色名稱
     * @apiParam {Array} permission 權限
     *
     * @apiParamExample {json} Request-Example:
     * {
     *       "role_id": 1
     *       "name": "管理員",
     *       "permission": [
     *          "1-1-1",
     *          "1-1-2",
     *          "2-1-1"
     *       ]
     * }
     *
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
     * @api {get} /role/delete/:id 刪除角色
     * @apiQuery {Number} id 角色ID
     * @apiName RoleDelete
     * @apiGroup Role
     *
     */
    public function delete($id)
    {
        if(!$this->roleService->detail($id)) {
            return response()->fail();
        }

        return response()->ok($this->roleService->deleteRole($id));
    }
}
