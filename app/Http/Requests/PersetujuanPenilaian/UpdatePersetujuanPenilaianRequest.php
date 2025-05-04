<?php

namespace App\Http\Requests\PersetujuanPenilaian;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersetujuanPenilaianRequest extends FormRequest
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
            'status' => 'required|array',
            'status.*' => 'required|in:Disetujui,Tidak Disetujui',
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
            'status.required' => 'Status harus diisi',
        ];
    }
}
