<?php

namespace App\Http\Resources\ItemCategory;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Item\ItemResource;

class ItemCategoryResource extends JsonResource
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
            'id'    => $this->id,
            'name'  => $this->name,
            'items' => ItemResource::collection($this->items),
        ];
    }
}
