<?php

namespace App\Http\Requests\GroupPenilaian;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupPenilaianRequest extends FormRequest
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
            'id_group_karyawan' => 'required',
            'alternatif_pertama.*' => 'required',
            'alternatif_kedua.*' => 'required',
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
            'alternatif_kedua.*.required' => 'Nama karyawan harus diisi',
        ];
    }
}
