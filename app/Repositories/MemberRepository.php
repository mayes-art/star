<?php

namespace App\Repositories;

use App\Models\Member;
use App\Constants\Pagination;

class MemberRepository extends BaseRepository
{
    protected $model;

    public function __construct(Member $model)
    {
        $this->model = $model;
    }

    public function createMember($data)
    {
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->paginate(Pagination::MEMBER);
    }

    public function getMember($id)
    {
        return $this->model->find($id);
    }

    public function editMember($id, $params)
    {
        $member = $this->model->find($id);

        return $member->update($params);
    }

    public function deleteMember($id)
    {
        $member = $this->model->find($id);

        return $member->delete();
    }
}
