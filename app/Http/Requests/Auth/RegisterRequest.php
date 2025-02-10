<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|max:200',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8||max:255|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required'  => 'Username không được để trống!',
            'username.max'       => 'Username tối đa 200 ký tự!',
            'email.required'     => 'Email không được để trống!',
            'email.email'        => 'Email không hợp lệ!',
            'email.max'          => 'Email tối đa 255 ký tự!',
            'email.unique'       => 'Email đã tồn tại!',
            'password.required'  => 'Mật khẩu không được để trống!',
            'password.min'       => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.max'       => 'Mật khẩu tối đa 255 ký tự!',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',

        ];
    }
}
