<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => (string)$this->id,
            'username'      => $this->username,
            'gender'        => $this->gender,
            'name'          => $this->name,
            'birthday'      => $this->birthday,
            'phone'         => $this->phone,
            'email'         => $this->email,
            'address'       => $this->address,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'last_login_at' => $this->last_login_at,
        ];
    }
}
