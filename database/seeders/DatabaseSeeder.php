<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@qcall.com'],
            [
                'name' => 'Admin QCall',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]
        );

        $user = User::updateOrCreate(
            ['email' => 'user@qcall.test'],
            [
                'name' => 'Alya QCall',
                'password' => Hash::make('user12345'),
                'role' => 'user',
            ]
        );

        Registration::updateOrCreate(
            ['user_id' => $user->id],
            [
                'name' => 'Alya QCall',
                'phone' => '+62 81234567890',
                'gender' => 'Perempuan',
                'country' => 'Indonesia',
                'age' => 20,
                'preferred_time' => 'Malam (18.00 - 21.00)',
                'status' => 'pending',
            ]
        );
    }
}
