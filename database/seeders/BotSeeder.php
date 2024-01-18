<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class BotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed admin account
        $user = User::create([
            'username' => $_ENV['BOT_USERNAME'],
            'email' => $_ENV['BOT_EMAIL'],
            'password' => Hash::make($_ENV['BOT_PASSWORD']),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole(UserRole::BOT->value);
        $user->avatars()->attach(1, ['active' => 1]);
    }
}
