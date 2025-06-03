<?php

namespace App\Http\Requests\Kriteria;

use Illuminate\Foundation\Http\FormRequest;

class StoreKriteriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('kode_kriteria')) {
            $this->merge([
                'kode_kriteria' => decrypt($this->kode_kriteria),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_kriteria' => 'required|unique:kriteria,kode_kriteria|max:10',
            'nama_kriteria' => 'required|max:255',
            'bobot_kriteria' => 'required|numeric',
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
            'kode_kriteria.required' => 'Kode kriteria harus diisi',
            'kode_kriteria.unique' => 'Kode kriteria sudah ada',
            'kode_kriteria.max' => 'Kode kriteria maksimal 10 karakter',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'nama_kriteria.max' => 'Nama kriteria maksimal 255 karakter',
            'bobot_kriteria.required' => 'Bobot kriteria harus diisi',
            'bobot_kriteria.numeric' => 'Bobot kriteria harus berupa angka',
        ];
    }
}
