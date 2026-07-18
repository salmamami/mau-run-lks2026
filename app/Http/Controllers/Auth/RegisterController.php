<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function show(Registration $registration)
    {
        $registration->load([
            'event.city',
            'event.eventType',
            'user'
        ]);

        return view(
            'admin.registrations.show',
            compact('registration')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',

            'nik' => [
                'required',
                'digits:16',
                'unique:users,nik'
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],

            'no_hp' => [
                'required',
                'regex:/^[0-9]{10,15}$/',
                'unique:users,no_hp'
            ],

            'password' => [
                'required',
                'min:6',
                'confirmed'
            ]
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik.unique' => 'NIK sudah terdaftar.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP harus berupa angka 10-15 digit.',
            'no_hp.unique' => 'Nomor HP sudah digunakan.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.'
        ]);

        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => 'peserta'
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}