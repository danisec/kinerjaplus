<?php

namespace App\Http\Requests\NilaiSkala;

use Illuminate\Foundation\Http\FormRequest;

class StoreNilaiSkalaRequest extends FormRequest
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
            'skala' => 'required',
            'nilai_skala' => 'required|min:1|max:100'
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
            'skala.required' => 'Skala harus diisi',
            'nilai_skala.required' => 'Nilai skala harus diisi',
            'nilai_skala.min' => 'Nilai skala minimal 1',
            'nilai_skala.max' => 'Nilai skala maksimal 100'
        ];
    }
}
