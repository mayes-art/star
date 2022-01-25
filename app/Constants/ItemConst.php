<?php

namespace App\Constants;

class ItemConst
{
    /**
     * 是否刪除: 刪除
     */
    const DELETE = 1;

    /**
     * 是否刪除: 未刪除
     */
    const NOT_DELETE = 0;

    /**
     * 是否刪除類型
     */
    const DELETE_TYPE = [
        self::DELETE,
        self::NOT_DELETE,
    ];

    /**
     * 狀態: 未進
     */
    const NOT_PURCHASED = 0;

    /**
     * 狀態: 上架
     */
    const ON_SHELF = 1;

    /**
     * 狀態: 下架
     */
    const OFF_SHELF = 2;

    /**
     * 狀態類型
     */
    const STATUS_TYPE = [
        self::NOT_PURCHASED,
        self::ON_SHELF,
        self::OFF_SHELF,
    ];
}
