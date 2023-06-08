<?php

namespace App\Http\Requests;



class RegisterRequest extends CustomFormRequest
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
            'user_name'  => 'required|string',
            'user_email' => 'required|email|unique:users,user_email',
            'user_phone' => 'required|unique:users,user_phone',
            'password'   => 'required',
        ];
    }






}
