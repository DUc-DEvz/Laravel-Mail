<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Email không được để trống!',
            'email.email'       => 'Email không hợp lệ',
            'email.max:255'     => 'Tối đa 255 ký tự!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min'      => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max:255'  => 'Tối đa 255 ký tự!',
        ];
    }
}
