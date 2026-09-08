<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'phone' => ['required', 'string', 'max:30'],
            'gender' => ['nullable', 'string', 'in:Laki-laki,Perempuan'],
            'country' => ['nullable', 'string', 'max:80'],
            'age' => ['required', 'integer', 'min:5', 'max:100'],
            'preferred_time' => ['required', 'string', 'max:50'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah terdaftar. Silakan login.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
            'phone.required' => 'Nomor Handphone/Whatsapp wajib diisi.',
            'age.required' => 'Usia wajib diisi.',
            'age.integer' => 'Usia harus berupa angka.',
            'age.min' => 'Usia minimal 5 tahun.',
            'age.max' => 'Usia maksimal 100 tahun.',
            'preferred_time.required' => 'Waktu belajar wajib dipilih.',
        ]);

        $phone = '+62 ' . preg_replace('/\D+/', '', $validated['phone']);

        $user = DB::transaction(function () use ($validated, $phone) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => strtolower($validated['email']),
                'password' => Hash::make($validated['password']),
                'role' => 'user',
            ]);

            Registration::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'phone' => $phone,
                'gender' => $validated['gender'] ?? null,
                'country' => $validated['country'] ?? null,
                'age' => $validated['age'],
                'preferred_time' => $validated['preferred_time'],
                'status' => 'pending',
            ]);

            return $user;
        });

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat. Silakan login menggunakan email dan password kamu.');
    }
}
