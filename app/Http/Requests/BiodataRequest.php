<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'nama_panggilan' => 'required|string',

            'nisn' => 'nullable|string',
            'nik' => 'nullable|string',

            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha', // FIX CASE

            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',

            'no_akta_lahir' => 'nullable|string',

            'kewarganegaraan' => 'nullable|string',
            'kebutuhan_khusus' => 'nullable|string',
            'anak_ke' => 'nullable|integer',

            'alamat_asal' => 'required|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'dusun' => 'nullable|string',

            'kode_pos' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kota' => 'nullable|string',

            'lintang' => 'nullable|string',
            'bujur' => 'nullable|string',

            'nama_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'pekerjaan_ayah' => 'nullable|string',
            'pekerjaan_ibu' => 'nullable|string',

            'no_telp' => 'nullable|string',

            'tempat_tinggal' => 'nullable|string',
            'transportasi' => 'nullable|string',

            'no_kks' => 'nullable|string',
            'kps_pkp' => 'nullable|boolean',
        ];
    }
}