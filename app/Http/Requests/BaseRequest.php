<?php

namespace App\Http\Requests;

use App\Constants\StatusCode;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class BaseRequest extends FormRequest
{
    /**
     * Override a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => StatusCode::REQUEST_ERROR,
            'message' => $validator->errors()->first(),
        ], SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY);

        throw new HttpResponseException($response);
    }
}
