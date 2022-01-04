<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Constants\StatusCode;
use App\Services\ItemCategoryService;
use App\Http\Requests\ItemCategory\ItemCategoryEditRequest;
use App\Http\Requests\ItemCategory\ItemCategoryAddRequest;

class ItemCategoryController extends Controller
{
    protected $itemCategoryService;

    public function __construct(ItemCategoryService $itemCategoryService)
    {
        $this->itemCategoryService = $itemCategoryService;
    }

    /**
     * 商品類型列表
     * @api {get} /item-category/list 商品類型列表
     * @apiName ItemCategoryList
     * @apiGroup ItemCategory
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
     * @apiSuccess {Integer} data.id 商品類型ID
     * @apiSuccess {String} data.name 商品類型名稱
     * @apiSuccess {Object} data.items 商品清單
     * @apiSuccess {Integer} items.id 商品ID
     * @apiSuccess {String} items.name 商品角稱
     * @apiSuccess {Integer} items.category_id 商品類型ID
     * @apiSuccess {Integer} items.storage_id 儲位ID
     * @apiSuccess {String} items.description 商品描述
     * @apiSuccess {Number} items.price 商品價格
     * @apiSuccess {Integer} items.stock 庫存量
     * @apiSuccess {Integer} items.status 狀態(0:未進/1:上架/2:下架)
     * @apiSuccess {String} items.created_at 新增時間
     * @apiSuccess {String} items.updated_at 更新時間
     * @apiSuccess {String} items.on_shelf 上架時間
     * @apiSuccess {String} items.off_shelf 下架時間
     *
     * @apiSuccess {Object} pagination
     * @apiSuccess {Integer} pagination.total 總筆數
     * @apiSuccess {Integer} pagination.per_page 每頁筆數
     * @apiSuccess {Integer} pagination.current 目前頁碼
     * @apiSuccess {Integer} pagination.pages 總頁數
     *
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *     "status": 1,
     *     "message": "ok",
     *     "data": {
     *         "data": [
     *             {
     *                 "id": 1,
     *                 "name": "寵物用品",
     *                 "items": [
     *                     {
     *                         "id": 1,
     *                         "name": "貓抓版",
     *                         "category_id": 1,
     *                         "storage_id": 2,
     *                         "description": "大型貓抓板",
     *                         "price": "100.00",
     *                         "stock": 1,
     *                         "status": 2,
     *                         "created_at": "2021-12-24 09:27:00",
     *                         "updated_at": "2021-12-27 01:37:02",
     *                         "on_shelf": "2021-12-01 00:00:00",
     *                         "off_shelf": "2021-12-27 01:36:31"
     *                     }
     *                 ]
     *             },
     *             {
     *                 "id": 2,
     *                 "name": "生活用品",
     *                 "items": []
     *             }
     *         ],
     *         "pagination": {
     *             "total": 2,
     *             "per_page": 10,
     *             "current": 1,
     *             "pages": 1
     *         }
     *     }
     * }
     *
     */
    public function list()
    {
        return response()->ok($this->itemCategoryService->getItemCategories());
    }

    /**
     * 新增商品類型
     * @api {post} /item-category/add 新增商品類型
     * @apiName ItemCategoryAdd
     * @apiGroup ItemCategory
     *
     * @apiParam {String} name 商品類型名稱
     *
     * @apiParamExample {json} Request-Example:
     * {
     *      "name": "寵物用品",
     * }
     *
     */
    public function add(ItemCategoryAddRequest $request)
    {
        $this->itemCategoryService->addItemCategory($request->validated());

        return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);
    }

    /**
     * 更新商品類型
     * @api {put} /item-category/edit 更新商品類型
     * @apiName ItemCategoryEdit
     * @apiGroup ItemCategory
     *
     * @apiParam {Integer} id 商品類型ID
     * @apiParam {String} name 商品類型名稱
     *
     * @apiParamExample {json} Request-Example:
     * {
     *      "id": 1,
     *      "name": "自動飼料機",
     * }
     *
     */
    public function edit(ItemCategoryEditRequest $request)
    {
        $params = $request->validated();

        if ($this->itemCategoryService->editItemCategory($params['id'], Arr::except($params, 'id'))) {
            return response()->ok();
        }

        return response()->ok(null, __('messages.update_success'), StatusCode::UPDATE_OK);
    }

    /**
     * 刪除商品類型
     * @api {delete} /item-category/:id 刪除商品類型
     * @apiQuery {Number} id 商品類型ID
     * @apiName ItemCategoryDelete
     * @apiGroup ItemCategory
     *
     */
    public function delete($id)
    {
        $this->itemCategoryService->deleteItemCategoryById($id);

        return response()->ok(null, __('messages.delete_success'), StatusCode::DELETE_OK);
    }
}
