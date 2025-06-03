<?php

namespace App\Http\Requests\Subkriteria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubkriteriaRequest extends FormRequest
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
            'kode_kriteria' => '',
            'kode_subkriteria' => 'max:10',
            'nama_subkriteria' => 'max:255',
            'deskripsi_subkriteria' => 'max:2000',
            'bobot_subkriteria' => 'required|numeric',
            'indikator_subkriteria' => 'max:200',
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
            'kode_subkriteria.max' => 'Kode subkriteria maksimal 10 karakter',
            'nama_subkriteria.max' => 'Nama subkriteria maksimal 255 karakter',
            'deskripsi_subkriteria.max' => 'Deskripsi subkriteria maksimal 2000 karakter',
            'bobot_subkriteria.required' => 'Bobot subkriteria harus diisi',
            'bobot_subkriteria.numeric' => 'Bobot subkriteria harus berupa angka',
            'indikator_subkriteria.max' => 'Indikator subkriteria maksimal 200 karakter',
        ];
    }
}
