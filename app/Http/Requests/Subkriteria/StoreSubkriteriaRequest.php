<?php

namespace App\Http\Requests\Subkriteria;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubkriteriaRequest extends FormRequest
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
            'kode_kriteria' => 'required|max:10',
            'kode_subkriteria' => 'required|unique:subkriteria,kode_subkriteria|max:10',
            'nama_subkriteria' => 'required|max:255',
            'deskripsi_subkriteria' => 'max:2000',
            'bobot_subkriteria' => 'required|numeric',
            'indikator_subkriteria' => 'required|max:200',
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
            'kode_kriteria.required' => 'Kriteria harus diisi',
            'kode_kriteria.max' => 'Kode kriteria maksimal 10 karakter',
            'kode_subkriteria.required' => 'Kode subkriteria harus diisi',
            'kode_subkriteria.unique' => 'Kode subkriteria sudah ada',
            'kode_subkriteria.max' => 'Kode subkriteria maksimal 10 karakter',
            'nama_subkriteria.required' => 'Nama subkriteria harus diisi',
            'nama_subkriteria.max' => 'Nama subkriteria maksimal 255 karakter',
            'deskripsi_subkriteria.max' => 'Deskripsi subkriteria maksimal 2000 karakter',
            'bobot_subkriteria.required' => 'Bobot subkriteria harus diisi',
            'bobot_subkriteria.numeric' => 'Bobot subkriteria harus berupa angka',
            'indikator_subkriteria.required' => 'Indikator subkriteria harus diisi',
            'indikator_subkriteria.max' => 'Indikator subkriteria maksimal 200 karakter',
        ];
    }
}
