<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\BaseRequest;

class RoleEditRequest extends BaseRequest
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
            'role_id'    => 'required|exists:roles,id',
            'name'       => 'required',
            'permission' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'role_id.required'    => __('messages.required', ['v' => __('params.role_id')]),
            'role_id.exists'      => __('messages.is_empty', ['v' => __('params.role_id')]),
            'name.required'       => __('messages.required', ['v' => __('params.role_name')]),
            'permission.required' => __('messages.required', ['v' => __('params.permission')])
        ];
    }
}
