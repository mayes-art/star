<?php

namespace App\Http\Requests\User;


use App\Http\Requests\BaseRequest;

class UserAddRequest extends BaseRequest
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
            'email'    => 'required|email',
            'account'  => 'required|string|unique:users,account',
            'nickname' => 'required|string',
            'password' => 'required|between:8,20',
            'role_id'  => 'required|integer|gt:0',
            'status'   => 'required|integer|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('messages.required', ['v' => __('params.email')]),
            'email.email' => __('messages.email', ['v' => __('params.email')]),
            'account.required' => __('messages.required', ['v' => __('params.account')]),
            'account.string' => __('messages.string', ['v' => __('params.account')]),
            'account.unique' => __('messages.unique', ['v' => __('params.account')]),
            'nickname.required' => __('messages.required', ['v' => __('params.nickname')]),
            'nickname.string' => __('messages.string', ['v' => __('params.nickname')]),
            'password.required' => __('messages.required', ['v' => __('params.password')]),
            'password.between' => __('messages.between', ['v' => __('params.password'), 'min' => 8, 'max' => 20]),
            'role_id.required' => __('messages.required', ['v' => __('params.role_id')]),
            'role_id.integer' => __('messages.integer', ['v' => __('params.role_id')]),
            'role_id.gt' => __('messages.gt', ['v' => __('params.role_id'), 'value' => 0]),
            'status.required' => __('messages.required', ['v' => __('params.status')]),
            'status.integer' => __('messages.integer', ['v' => __('params.status')]),
            'status.in' => __('messages.in', ['v' => __('params.status')]),
        ];
    }
}
