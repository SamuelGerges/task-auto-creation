<?php

namespace App\Http\Requests;

use App\Helpers\ResponsesHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CustomFormRequest extends FormRequest
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
        return [];
    }

    public function failedValidation(Validator $validator)
    {
        if ($this->header("is_api_call") != "yes"){
            return;
        }

        $response = ResponsesHelper::returnError(
            Response::HTTP_NOT_ACCEPTABLE,
            $validator->errors()->messages()
        );

        throw new HttpResponseException($response);
    }
}