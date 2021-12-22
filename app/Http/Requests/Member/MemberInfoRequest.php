<?php

namespace App\Http\Requests\Member;


use App\Http\Requests\BaseRequest;

class MemberInfoRequest extends BaseRequest
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
            'id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => __('messages.required', ['v' => __('params.member_id')]),
        ];
    }
}
