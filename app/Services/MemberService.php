<?php

namespace App\Services;

use App\Http\Resources\Member\MemberListResource;
use App\Repositories\MemberRepository;
use App\Traits\Pagination;

class MemberService
{
    use Pagination;

    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function addMember($data)
    {
        return $this->memberRepository->createMember($data);
    }

    public function getMembers()
    {
        return $this->formatterResource(
            $this->memberRepository->getList(),
            MemberListResource::class
        );
    }

    public function getMember($id)
    {
        return $this->memberRepository->getMember($id);
    }

    public function editMember($id, $params)
    {
        return $this->memberRepository->editMember($id, $params);
    }

    public function deleteMemberById($param)
    {
        return $this->memberRepository->deleteMember($param['id']);
    }
}
