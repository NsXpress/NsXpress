<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Articles', Article::all()->count())->description('Total amount of articles.'),
            Stat::make('Users', User::all()->count())->description('Total amount of users.'),
        ];
    }
}
