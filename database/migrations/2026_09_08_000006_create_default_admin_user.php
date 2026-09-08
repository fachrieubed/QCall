<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // Admin dibuat saat migrate, jadi akun admin tetap tersedia
        // tanpa harus mengandalkan db:seed.
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@qcall.com'],
            [
                'name' => 'Admin QCall',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'admin@qcall.test')->delete();
    }
};
