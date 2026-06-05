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
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'tanggal_pendaftaran' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|in:islam,kristen,katholik,hindu,budha,konghuchu',
            'tanggal_lahir' => 'required|date',
            'jumlah_saudara' => 'required|string',
            'tempat_lahir' => 'required|string',
            'rt_rw' => 'required|string',
            'kode_pos' => 'required|string',
            'alamat_asal' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'no_telp' => 'required|string',
            'no_hp' => 'required|string',
            'alamat_email' => 'required|string',
            'kegiatan_olahraga' => 'required|in:Aktif,Cukup,Kurang',
            'kegiatan_kesenian' => 'required|in:Aktif,Cukup,Kurang',
            'prestasi' => 'required|string',
            'status_tempat' => 'required|in:rumah sendiri,kontrakan,kosan',
        ];
    }
}