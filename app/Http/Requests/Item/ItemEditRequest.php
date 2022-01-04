<?php

namespace App\Http\Requests\Item;


use App\Http\Requests\BaseRequest;

class ItemEditRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'          => 'required|integer|gt:0|exists:items,id',
            'name'        => 'string',
            'category_id' => 'integer|gt:0|exists:item_categories,id',
            'storage_id'  => 'integer|gt:0',
            'description' => 'string|max:255',
            'price'       => 'numeric|gt:0',
            'stock'       => 'integer|gt:0',
            'status'      => 'integer|in:0,1,2',
            'on_shelf'    => 'date_format:Y-m-d H:i:s|nullable',
            'off_shelf'   => 'date_format:Y-m-d H:i:s|nullable',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => __('messages.required', ['v' => __('params.id')]),
            'id.integer' => __('messages.integer', ['v' => __('params.id')]),
            'id.gt' => __('messages.gt', ['v' => __('params.id'), 'value' => 0]),
            'id.exists' => __('messages.exists'),
            'name.string' => __('messages.string', ['v' => __('params.name')]),
            'category_id.integer' => __('messages.integer', ['v' => __('params.category_id')]),
            'category_id.gt' => __('messages.gt', ['v' => __('params.category_id'), 'value' => 0]),
            'category_id.exists' => __('messages.exists'),

            // TODO: 儲位驗證補齊
            'storage_id.integer' => __('messages.integer', ['v' => __('params.storage_id')]),
            'storage_id.gt' => __('messages.gt', ['v' => __('params.storage_id'), 'value' => 0]),

            'description.string' => __('messages.string', ['v' => __('params.description')]),
            'description.max' => __('messages.max', ['v' => __('params.description'), 'max' => 255]),
            'price.numeric' => __('messages.numeric', ['v' => __('params.price')]),
            'price.gt' => __('messages.gt', ['v' => __('params.price'), 'value' => 0]),
            'stock.integer' => __('messages.integer', ['v' => __('params.stock')]),
            'stock.gt' => __('messages.gt', ['v' => __('params.stock'), 'value' => 0]),
            'status.integer' => __('messages.integer', ['v' => __('params.status')]),
            'status.in' => __('messages.in', ['v' => __('params.status')]),
            'on_shelf.date_format' => __('messages.date_format', ['v' => __('params.on_shelf'), 'format' => 'Y-m-d H:i:s']),
            'off_shelf.date_format' => __('messages.date_format', ['v' => __('params.off_shelf'), 'format' => 'Y-m-d H:i:s']),
        ];
    }
}
