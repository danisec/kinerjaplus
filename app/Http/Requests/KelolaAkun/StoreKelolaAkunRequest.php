<?php

namespace App\Http\Requests\KelolaAkun;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelolaAkunRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|max:255',
            'username' => 'required', 'min:4', 'max:255', 'unique:users',
            'email' => 'required|email:dns|unique:users',
            'role' => 'required|exists:roles,name',
            'password' => 'required|min:8|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'fullname.required' => 'Nama lengkap harus diisi',
            'fullname.max' => 'Nama lengkap maksimal 255 karakter',
            'username.required' => 'Nama pengguna harus diisi',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.max' => 'Nama pengguna maksimal 255 karakter',
            'username.unique' => 'Nama pengguna sudah digunakan',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'role.required' => 'Peran pengguna harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
        ];
    }
}
