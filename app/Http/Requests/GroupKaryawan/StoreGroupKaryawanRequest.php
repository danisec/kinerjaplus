<?php

namespace App\Http\Requests\GroupKaryawan;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupKaryawanRequest extends FormRequest
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
            'nama_group_karyawan' => 'required|max:50',
            'kepala_sekolah' => 'required|max:4',
            'kode_alternatif.*' => 'required',
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
            'nama_group_karyawan.required' => 'Nama group karyawan harus diisi',
            'nama_group_karyawan.max' => 'Nama group karyawan maksimal 50 karakter',
            'kepala_sekolah.required' => 'Nama kepala sekolah harus diisi',
            'kepala_sekolah.max' => 'Nama kepala sekolah maksimal 4 karakter',
            'kode_alternatif.*.required' => 'Nama karyawan harus diisi',
        ];
    }
}
