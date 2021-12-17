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

    public function all($keys = null) 
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('id');

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'       => 'required|integer|gt:0|exists:users,id',
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
            'id.required' => __('messages.id', ['v' => __('params.id')]),
            'id.integer' => __('messages.integer', ['v' => __('params.id')]),
            'id.gt' => __('messages.gt', ['v' => __('params.id'), 'value' => 0]),
            'id.exists' => __('messages.exists'),
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
