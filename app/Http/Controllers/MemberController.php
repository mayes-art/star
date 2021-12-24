<?php

namespace App\Http\Controllers;

use App\Constants\StatusCode;
use App\Services\MemberService;
use App\Http\Requests\Member\MemberAddRequest;
use App\Http\Requests\Member\MemberInfoRequest;
use App\Http\Requests\Member\MemberEditRequest;
use App\Http\Requests\Member\MemberDeleteRequest;
use Illuminate\Support\Arr;

class MemberController extends Controller
{
    protected $memberService;

    public function __construct(memberService $memberService)
    {
        $this->memberService = $memberService;
    }

    /**
     * 新增會員
     */
    public function add(MemberAddRequest $request)
    {
        if ($this->memberService->addMember($request->validated())) {
            return response()->ok(null, __('messages.create_success'), StatusCode::CREATE_OK);
        }

        return response()->fail(null, __('messages.create_fail'), StatusCode::CREATE_FAIL);
    }

    /**
     * 會員列表
     */
    public function list()
    {
        return response()->ok($this->memberService->getMembers());
    }

    /**
     * 單一會員資訊
     */
    public function info(MemberInfoRequest $request)
    {
        return response()->ok($this->memberService->getMember($request->validated()));
    }

    /**
     * 更新會員資訊
     */
    public function edit(MemberEditRequest $request)
    {
        $params = $request->validated();

        if ($this->memberService->editMember($params['id'], Arr::except($params, 'id'))) {
            return response()->ok(null, __('messages.update_success'), StatusCode::UPDATE_OK);
        }

        return response()->fail(null, __('messages.update_fail'), StatusCode::UPDATE_FAIL);
    }

    /**
     * 刪除會員
     */
    public function delete(MemberDeleteRequest $request)
    {
        if ($this->memberService->deleteMemberById($request->validated())) {
            return response()->ok(null, __('messages.delete_success'), StatusCode::DELETE_OK);
        }

        return response()->fail(null, __('messages.delete_fail'), StatusCode::DELETE_FAIL);
    }
}
