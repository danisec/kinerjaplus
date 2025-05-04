<?php

namespace App\Http\Requests\CatatanKaryawan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatatanKaryawanRequest extends FormRequest
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
            'id_penilaian' => '',
            'id_tanggal_penilaian' => '',
            'catatan' => 'required',
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
            'catatan.required' => 'Catatan harus diisi',
        ];
    }
}
