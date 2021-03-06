<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'min 8|confirmed'
        ];
    }

    public function message()
    {
        return[
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Pasword tidak sama'
        ];
    }
}
