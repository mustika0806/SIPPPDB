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
            'nik' => 'required|string',
            'tanggal_pendaftaran' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katholik,Hindu,Budha,Konghuchu',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jumlah_saudara' => 'required|numeric',
            'no_akta_lahir' => 'required|string',
            'kewarganegaraan' => 'required|in:Indonesia,Asing',
            'kebutuhan_khusus' => 'required|in:Tidak,Netra,Rungu,Grahita,Wicara,Daksa,Autis',
            'anak_ke' => 'required|numeric',
            'alamat_asal' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',
            'kode_pos' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'lintang' => 'required|string',
            'bujur' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'no_telp' => 'required|string',
            'no_hp' => 'required|string',
            'alamat_email' => 'required|string',
            'kegiatan_olahraga' => 'required|in:Aktif,Cukup,Kurang',
            'kegiatan_kesenian' => 'required|in:Aktif,Cukup,Kurang',
            'prestasi' => 'required|string',
            'status_tempat' => 'required|in:rumah sendiri,kontrakan,kosan',
            'transportasi' => 'required|in:Jalan Kaki,Kendaraan Pribadi,Angkutan Umum,Sepeda',
            'no_kks' => 'required|string',
            'kps_pkp' => 'required|in:Tidak,Ya',
        ];
    }
}