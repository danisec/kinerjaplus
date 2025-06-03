<?php

namespace App\Http\Requests\NilaiSkala;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNilaiSkalaRequest extends FormRequest
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
            'id_nilai_skala' => '',
            'skala' => '',
            'nilai_skala' => 'min:1|max:100'
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
            'nilai_skala.min' => 'Nilai skala minimal 1',
            'nilai_skala.max' => 'Nilai skala maksimal 100'
        ];
    }
}
