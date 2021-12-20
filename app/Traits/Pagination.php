<?php

namespace App\Traits;

trait Pagination
{
    public function formatterResource($data, $resource)
    {
        $arrayList = $data->toArray();

        return [
            'data' => $resource::collection($data),
            'pagination' => [
                'total'    => $arrayList['total'],
                'per_page' => $arrayList['per_page'],
                'current'  => $arrayList['current_page'],
                'pages'    => $arrayList['last_page']
            ]
        ];
    }
}
