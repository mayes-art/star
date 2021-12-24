<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\BaseRequest;

class RoleListRequest extends BaseRequest
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
            'page' => 'required|gt:0',
            'count' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'page.required' => __('messages.required', ['v' => __('params.page')]),
            'page.gt' => __('messages.gt', ['v' => 'params.page', 'value' => 0]),
            'count.required' => __('messages.required', ['v' => __('params.count')]),
        ];
    }
}
