<?php

namespace App\Http\Requests\ItemCategory;


use App\Http\Requests\BaseRequest;

class ItemCategoryEditRequest extends BaseRequest
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
            'id'   => 'required|integer|gt:0|exists:item_categories,id',
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => __('messages.required', ['v' => __('params.id')]),
            'id.integer' => __('messages.integer', ['v' => __('params.id')]),
            'id.gt' => __('messages.gt', ['v' => __('params.id'), 'value' => 0]),
            'id.exists' => __('messages.exists'),
            'name.required' => __('messages.name', ['v' => __('params.name')]),
            'name.string' => __('messages.string', ['v' => __('params.name')]),
        ];
    }
}
