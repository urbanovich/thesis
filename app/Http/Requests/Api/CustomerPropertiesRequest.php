<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CustomerPropertiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "required|email",
            "first_name" => "nullable|string",
            "last_name" => "nullable|string",
            "phone_number" => "nullable|string",
            "address1" => "nullable|string",
            "address2" => "nullable|string",
            "city" => "nullable|string",
            "zip" => "nullable|string",
            "region" => "nullable|string",
            "country" => "nullable|string"
        ];
    }
}
