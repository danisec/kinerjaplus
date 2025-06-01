<?php

namespace App\Http\Requests\SkalaIndikator;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkalaIndikatorRequest extends FormRequest
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
            'id_indikator_subkriteria' => 'required',
            'skala' => '',
            'deskripsi_skala' => 'required',
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
            'id_indikator_subkriteria.required' => 'Indikator subkriteria harus diisi',
            'deskripsi_skala.required' => 'Deskripsi skala harus diisi',
        ];
    }
}
