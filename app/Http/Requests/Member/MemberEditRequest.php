<?php

namespace App\Http\Requests\Member;


use App\Http\Requests\BaseRequest;

class MemberEditRequest extends BaseRequest
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
            'id'                    => 'required|exists:members,id',
            'password'              => 'between:8,20|confirmed',
            'password_confirmation' => 'between:8,20',
            'status'                => 'integer|in:0,1',
            'level'                 => 'integer|in:0,1,2',
            'name'                  => 'string',
            'phone'                 => 'string',
            'email'                 => 'email|unique:members,email',
            'address'               => 'string',
        ];
    }

    public function messages()
    {
        return [
            'id.required'                     => __('messages.required', ['v' => __('params.member_id')]),
            'id.exists'                       => __('messages.exists', ['v' => __('params.member_id')]),
            'password.between'                => __('messages.between', ['v' => __('params.member_password'), 'min' => 8, 'max' => 20]),
            'password.confirmed'              => __('messages.confirmed', ['v' => __('params.member_password')]),
            'password_confirmation.confirmed' => __('messages.confirmed', ['v' => __('params.member_password_confirmation')]),
            'status.integer'                  => __('messages.integer', ['v' => __('params.status')]),
            'status.in'                       => __('messages.in', ['v' => __('params.status')]),
            'level.integer'                   => __('messages.integer', ['v' => __('params.level')]),
            'level.in'                        => __('messages.in', ['v' => __('params.level')]),
            'name.string'                     => __('messages.string', ['v' => __('params.member_name')]),
            'phone.string'                    => __('messages.string', ['v' => __('params.phone')]),
            'email.email'                     => __('messages.email', ['v' => __('params.email')]),
            'email.unique'                    => __('messages.unique', ['v' => __('params.email')]),
            'address.string'                  => __('messages.string', ['v' => __('params.address')]),
       ];
    }
}
