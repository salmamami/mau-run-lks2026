<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_lengkap'      => 'required|string|max:100',
            'email'             => 'required|email',
            'nik'               => 'required|digits:16',
            'no_hp'             => 'required|regex:/^[0-9]{10,15}$/',
            'jenis_kelamin'     => 'required',
            'ukuran_jersey'     => 'required',
            'bukti_pembayaran'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',

            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',

            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP harus terdiri dari 10-15 digit angka.',

            'jenis_kelamin.required' => 'Pilih jenis kelamin.',

            'ukuran_jersey.required' => 'Pilih ukuran jersey.',

            'bukti_pembayaran.required' => 'Silakan upload bukti pembayaran.',
            'bukti_pembayaran.image' => 'File harus berupa gambar.',
            'bukti_pembayaran.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'bukti_pembayaran.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}