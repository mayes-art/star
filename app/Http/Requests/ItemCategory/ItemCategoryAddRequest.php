<?php

namespace App\Http\Requests\ItemCategory;


use App\Http\Requests\BaseRequest;

class ItemCategoryAddRequest extends BaseRequest
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
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.required', ['v' => __('params.name')]),
            'name.string' => __('messages.string', ['v' => __('params.name')]),
        ];
    }
}
