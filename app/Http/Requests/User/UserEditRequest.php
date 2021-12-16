<?php

namespace App\Http\Requests\User;


use App\Http\Requests\BaseRequest;

class UserEditRequest extends BaseRequest
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
            'email'    => 'email',
            'nickname' => 'string',
            'password' => 'between:8,20',
            'role_id'  => 'integer|gt:0',
            'status'   => 'integer|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => __('messages.email', ['v' => __('params.email')]),
            'nickname.string' => __('messages.string', ['v' => __('params.nickname')]),
            'password.between' => __('messages.between', ['v' => __('params.password'), 'min' => 8, 'max' => 20]),
            'role_id.integer' => __('messages.integer', ['v' => __('params.role_id')]),
            'role_id.gt' => __('messages.gt', ['v' => __('params.role_id'), 'value' => 0]),
            'status.integer' => __('messages.integer', ['v' => __('params.status')]),
            'status.in' => __('messages.in', ['v' => __('params.status')]),
        ];
    }
}
