<?php

namespace App\Http\Resources\Item;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'category_id' => $this->category_id,
            'board_id'    => $this->board_id,
            'description' => $this->description,
            'price'       => $this->price,
            'stock'       => $this->stock,
            'status'      => $this->status,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            'on_shelf'    => $this->on_shelf,
            'off_shelf'   => $this->off_shelf,
        ];
    }
}
