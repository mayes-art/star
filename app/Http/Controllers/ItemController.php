<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Constants\StatusCode;
use App\Services\ItemService;
use App\Http\Requests\Item\ItemEditRequest;
use App\Http\Requests\Item\ItemAddRequest;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * 商品列表
     * @api {get} /item/list 商品列表
     * @apiName ItemList
     * @apiGroup Item
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
     * @apiSuccess {Integer} id 商品ID
     * @apiSuccess {String} name 商品名稱
     * @apiSuccess {Integer} category_id 商品類型ID
     * @apiSuccess {Integer} board_id 儲位ID
     * @apiSuccess {String} description 商品描述
     * @apiSuccess {Number} price 商品價格
     * @apiSuccess {Integer} stock 庫存量
     * @apiSuccess {Integer} status 狀態(0:未進/1:上架/2:下架)
     * @apiSuccess {String} created_at 新增時間
     * @apiSuccess {String} updated_at 更新時間
     * @apiSuccess {String} on_shelf 上架時間
     * @apiSuccess {String} off_shelf 下架時間
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
     *   "status": 1,
     *   "message": "ok",
     *   "data": {
     *       "data": [
     *           {
     *               "id": 1,
     *               "name": "貓抓版",
     *               "category_id": 1,
     *               "board_id": 2,
     *               "description": "大型貓抓板",
     *               "price": "100.00",
     *               "stock": 1,
     *               "status": 2,
     *               "created_at": "2021-12-24 09:27:00",
     *               "updated_at": "2021-12-27 01:37:02",
     *               "on_shelf": "2021-12-01 00:00:00",
     *               "off_shelf": "2021-12-27 01:36:31"
     *           }
     *       ],
     *       "pagination": {
     *           "total": 2,
     *           "per_page": 10,
     *           "current": 1,
     *           "pages": 1
     *       }
     *   }
     * }
     *
     */
    public function list()
    {
        return response()->ok($this->itemService->getItems());
    }

    /**
     * 單一商品資料
     * @api {get} /item/:id 單一商品資料
     * @apiQuery {Number} id 商品ID
     * @apiName ItemInfo
     * @apiGroup Item
     *
     * @apiSuccess {Integer} id 商品ID
     * @apiSuccess {String} name 商品名稱
     * @apiSuccess {Integer} category_id 商品類型ID
     * @apiSuccess {Integer} board_id 儲位ID
     * @apiSuccess {String} description 商品描述
     * @apiSuccess {Number} price 商品價格
     * @apiSuccess {Integer} stock 庫存量
     * @apiSuccess {Integer} status 狀態(0:未進/1:上架/2:下架)
     * @apiSuccess {String} created_at 新增時間
     * @apiSuccess {String} updated_at 更新時間
     * @apiSuccess {String} on_shelf 上架時間
     * @apiSuccess {String} off_shelf 下架時間
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
     *   "status": 1,
     *   "message": "ok",
     *   "data": {
     *       "id": 1,
     *       "name": "貓抓版",
     *       "category_id": 1,
     *       "board_id": 2,
     *       "description": "大型貓抓板",
     *       "price": "100.00",
     *       "stock": 1,
     *       "status": 2,
     *       "created_at": "2021-12-24 09:27:00",
     *       "updated_at": "2021-12-27 01:37:02",
     *       "on_shelf": "2021-12-01 00:00:00",
     *       "off_shelf": "2021-12-27 01:36:31"
     *   }
     * }
     *
     */
    public function info($id)
    {
        return response()->ok($this->itemService->getItem($id));
    }

    /**
     * 新增商品
     * @api {post} /item/add 新增商品
     * @apiName ItemAdd
     * @apiGroup Item
     *
     * @apiParam {String} name 商品名稱
     * @apiParam {Integer} category_id 商品類型ID
     * @apiParam {Integer} board_id 儲位ID
     * @apiParam {String} description 商品描述
     * @apiParam {Number} price 商品價格
     * @apiParam {Integer} stock 庫存量
     * @apiParam {Integer} status 狀態(0:未進/1:上架/2:下架)
     * @apiParam {String} on_shelf 上架時間
     * @apiParam {String} off_shelf 下架時間
     *
     * @apiParamExample {json} Request-Example:
     * {
     *      "name": "自動飼料機",
     *      "category_id": 1,
     *      "board_id": 1,
     *      "description": "貓奴必需用品之一",
     *      "price": 1000,
     *      "stock": 1,
     *      "status": 1,
     *      "on_shelf": "2021-12-01 00:00:00",
     *      "off_shelf": "2021-12-01 00:00:00"
     * }
     *
     */
    public function add(ItemAddRequest $request)
    {
        $this->itemService->addItem($request->validated());

        return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);
    }

    /**
     * 更新商品
     * @api {put} /item/edit 更新商品
     * @apiName ItemEdit
     * @apiGroup Item
     *
     * @apiParam {Integer} id 商品ID
     * @apiParam {String} name 商品名稱
     * @apiParam {Integer} category_id 商品類型ID
     * @apiParam {Integer} board_id 儲位ID
     * @apiParam {String} description 商品描述
     * @apiParam {Number} price 商品價格
     * @apiParam {Integer} stock 庫存量
     * @apiParam {Integer} status 狀態(0:未進/1:上架/2:下架)
     * @apiParam {String} on_shelf 上架時間
     * @apiParam {String} off_shelf 下架時間
     *
     * @apiParamExample {json} Request-Example:
     * {
     *      "id": 1,
     *      "name": "自動飼料機",
     *      "category_id": 1,
     *      "board_id": 1,
     *      "description": "貓奴必需用品之一",
     *      "price": 1000,
     *      "stock": 1,
     *      "status": 1,
     *      "on_shelf": "2021-12-01 00:00:00",
     *      "off_shelf": "2021-12-01 00:00:00"
     * }
     *
     */
    public function edit(ItemEditRequest $request)
    {
        $params = $request->validated();

        if ($this->itemService->editItem($params['id'], Arr::except($params, 'id'))) {
            return response()->ok();
        }

        return response()->ok(null, __('messages.update_success'), StatusCode::UPDATE_OK);
    }

    /**
     * 刪除商品
     * @api {delete} /item/:id 刪除商品
     * @apiQuery {Number} id 商品ID
     * @apiName ItemDelete
     * @apiGroup Item
     *
     */
    public function delete($id)
    {
        $this->itemService->deleteItemById($id);

        return response()->ok(null, __('messages.delete_success'), StatusCode::DELETE_OK);
    }
}
