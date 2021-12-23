<?php

namespace App\Http\Requests\Member;


use App\Http\Requests\BaseRequest;

class MemberAddRequest extends BaseRequest
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
            'username'              => 'required|string|unique:members,username',
            'password'              => 'required|between:8,20|confirmed',
            'password_confirmation' => 'required',
            'status'                => 'integer|in:0,1',
            'level'                 => 'integer|in:0,1,2',
            'gender'                => 'required|integer|in:1,2',
            'name'                  => 'required',
            'birthday'              => 'required|date',
            'phone'                 => 'nullable|string',
            'email'                 => 'nullable|email|unique:members,email',
            'address'               => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'username.required'              => __('messages.required', ['v' => __('params.member_username')]),
            'username.string'                => __('messages.string', ['v' => __('params.member_username')]),
            'username.unique'                => __('messages.unique', ['v' => __('params.member_username')]),
            'password.required'              => __('messages.required', ['v' => __('params.member_password')]),
            'password.between'               => __('messages.between', ['v' => __('params.member_password'), 'min' => 8, 'max' => 20]),
            'password.confirmed'             => __('messages.confirmed', ['v' => __('params.member_password')]),
            'password_confirmation.required' => __('messages.required', ['v' => __('params.member_password_confirmation')]),
            'status.integer'                 => __('messages.integer', ['v' => __('params.status')]),
            'status.in'                      => __('messages.in', ['v' => __('params.status')]),
            'level.integer'                  => __('messages.integer', ['v' => __('params.level')]),
            'level.in'                       => __('messages.in', ['v' => __('params.level')]),
            'gender.required'                => __('messages.required', ['v' => __('params.gender')]),
            'gender.integer'                 => __('messages.integer', ['v' => __('params.gender')]),
            'gender.in'                      => __('messages.in', ['v' => __('params.gender')]),
            'name.required'                  => __('messages.required', ['v' => __('params.member_name')]),
            'birthday.required'              => __('messages.required', ['v' => __('params.birthday')]),
            'birthday.date'                  => __('messages.date', ['v' => __('params.birthday')]),
            'phone.string'                   => __('messages.string', ['v' => __('params.phone')]),
            'email.email'                    => __('messages.email', ['v' => __('params.email')]),
            'email.unique'                   => __('messages.unique', ['v' => __('params.email')]),
            'address.string'                 => __('messages.string', ['v' => __('params.address')]),
        ];
    }
}
