<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisRequest extends FormRequest
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
            'email'              => "required|unique:users|email",
            'password'           => "required|min:6",
            'city'               => "required"
        ];
    }

    public function messages()
    {
        return [
            'password.required'  => "Password wajib diisi.",
            'password.min'       => "Password minimal diisi dengan 6 karakter.",

            'email.required'     => "Email wajib diisi.",
            'email.email'        => "Email tidak valid.",
            'email.unique'       => "Email sudah terdaftar.",

            'city.required'      => "Kota wajib diisi.",
        ];
    }
}
