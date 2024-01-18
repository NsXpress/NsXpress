<?php

namespace Database\Seeders;

use App\Models\Contest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contest::create([
            'name' => 'Avisens første konkurrence!',
            'content' => 'For at fejre både vores såvel som Netstationens lancering, har vi valgt at udskrive vores første konkurrence!',
            'prize' => '500 Monetter, 2 stk. Jorbærpalme, 1 stk. 30 VIP',
            'start_date' => now()->subWeeks(3),
            'end_date' => now()->subWeek()
        ]);

        Contest::create([
            'name' => 'Søndagskonkurrence',
            'content' => 'Det er blevet søndag og det er endnu engang tid til en ugentlig konkurrence.',
            'prize' => '1000 Monetter',
            'start_date' => now()->subWeeks(3),
            'end_date' => now()->subWeek()
        ]);
    }
}
