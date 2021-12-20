<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'role_id'    => $this->id,
            'name'       => $this->name,
            'permission' => $this->permission,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
