<?php

namespace App\Http\Requests\Alternatif;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlternatifRequest extends FormRequest
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
        if ($this->has('kode_alternatif')) {
            $this->merge([
                'kode_alternatif' => decrypt($this->kode_alternatif),
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
            'kode_alternatif' => 'required|max:4|unique:alternatif,kode_alternatif',
            'nama_alternatif' => 'required|max:255|unique:alternatif,nama_alternatif',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|numeric|unique:alternatif,nip',
            'jabatan' => 'required|max:50',
            'pendidikan' => 'required|max:100',
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
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.max' => 'Kode alternatif maksimal 4 karakter',
            'kode_alternatif.unique' => 'Kode alternatif sudah ada',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'nama_alternatif.max' => 'Nama karyawan maksimal 255 karakter',
            'nama_alternatif.unique' => 'Nama karyawan sudah ada',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.numeric' => 'Nomor induk pegawai harus berupa angka',
            'nip.unique' => 'Nomor induk pegawai sudah ada',
            'jabatan.required' => 'Jabatan harus diisi',
            'jabatan.max' => 'Jabatan maksimal 50 karakter',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 100 karakter',
        ];
    }
}
