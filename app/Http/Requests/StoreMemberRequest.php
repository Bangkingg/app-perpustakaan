<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreMemberRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:200',
            'nim' => 'required|integer|min:0',
            'email' => 'required|email|string|max:200',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'status' => 'required|string|max:10',
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 200 karakter.',

            'nim.required' => 'NIM wajib diisi.',
            'nim.integer' => 'NIM harus berupa angka.',
            'nim.min' => 'NIM minimal 0.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'email.max' => 'Email maksimal 200 karakter.',

            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.integer' => 'Nomor telepon harus berupa angka.',
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 digit.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',

            'status.required' => 'Status wajib diisi.',
            'status.string' => 'Status harus berupa teks.',
            'status.max' => 'Status maksimal 10 karakter.',
        ];
    }
}
