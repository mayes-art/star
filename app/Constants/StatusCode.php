<?php

namespace App\Constants;

class StatusCode
{
    /**
     * 回應成功
     */
    const OK = 1;

    /**
     * 新增成功
     */
    const CREATE_OK = 2;

    /**
     * 更新成功
     */
    const UPDATE_OK = 3;

    /**
     * 刪除成功
     */
    const DELETE_OK = 4;

    /**
     * 失敗
     */
    const FAIL = 0;

    /**
     * 請求參數錯誤
     */
    const REQUEST_ERROR = -1;

    /**
     * 新增失敗
     */
    const CREATE_FAIL = -2;

    /**
     * 更新失敗
     */
    const UPDATE_FAIL = -3;

    /**
     * 刪除失敗
     */
    const DELETE_FAIL = -4;

    /**
     * 登入成功
     */
    const LOGIN_OK = 1000;

    /**
     * 登入失敗
     */
    const LOGIN_FAIL = -1000;
}
