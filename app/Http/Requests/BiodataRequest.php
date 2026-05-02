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
            'tanggal_pendaftaran' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat_asal' => 'required|string',
        ];
    }
}
