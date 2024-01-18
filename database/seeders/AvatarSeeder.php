<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avatar::create([
            'name' => 'Standard',
            'description' => 'Et klassisk look.',
            'image' => 'default.png',
            'price' => 0,
            'is_public' => 0
        ]);
    }
}
