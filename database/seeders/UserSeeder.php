<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed admin account
        $user = User::create([
            'username' => $_ENV['ADMIN_USERNAME'],
            'email' => $_ENV['ADMIN_EMAIL'],
            'password' => Hash::make($_ENV['ADMIN_PASSWORD']),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole(UserRole::EDITOR->value);
        $user->avatars()->attach(1, ['active' => 1]);
    }
}
