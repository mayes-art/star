<?php

namespace App\Http\Requests\Role;


use App\Http\Requests\BaseRequest;

class RoleAddRequest extends BaseRequest
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
            'name'       => 'required',
            'permission' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required'       => __('messages.required', ['v' => __('params.role_name')]),
            'permission.required' => __('messages.required', ['v' => __('params.permission')]),
            'permission.array'    => __('messages.array', ['v' => __('params.permission')]),
        ];
    }
}
