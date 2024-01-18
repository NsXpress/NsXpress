<?php

namespace App\Services\Casino;

class HorseTrackService
{
    public static function getHorses(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Whiskeydrengen',
                'win_percentage' => 50,
                'multiplier' => 2
            ],
            [
                'id' => 2,
                'name' => 'Gallopperende Glæde',
                'win_percentage' => 35,
                'multiplier' => 3
            ],
            [
                'id' => 3,
                'name' => 'Stardust',
                'win_percentage' => 20,
                'multiplier' => 4,
            ],
            [
                'id' => 4,
                'name' => 'Nimbus',
                'win_percentage' => 10,
                'multiplier' => 5
            ]
        ];
    }

    public static function getHorseIds(): array
    {
        return array_column(self::getHorses(), 'id');
    }

    public static function getHorseById(int $id): ?array
    {
        return collect(self::getHorses())->firstWhere('id', $id);
    }
}