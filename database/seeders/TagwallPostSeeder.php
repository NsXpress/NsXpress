<?php

namespace Database\Seeders;

use App\Models\TagwallPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagwallPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagwallPost::factory()->count(50)->create();
    }
}
