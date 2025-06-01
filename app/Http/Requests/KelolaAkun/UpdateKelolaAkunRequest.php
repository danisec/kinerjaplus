<?php

namespace App\Http\Requests\KelolaAkun;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKelolaAkunRequest extends FormRequest
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
            'fullname' => 'max:255',
            'username' => 'min:4', 'max:255',
            'email' => 'email:dns',
            'role' => 'required|exists:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'exists:permissions,id',
            'password' => 'nullable|min:8|max:255',
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
            'fullname.max' => 'Nama lengkap maksimal 255 karakter',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.max' => 'Nama pengguna maksimal 255 karakter',
            'email.email' => 'Email tidak valid',
            'permission.required' => 'Permission harus dipilih',
            'permission.*.exists' => 'Permission yang dipilih tidak valid',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
        ];
    }
}
