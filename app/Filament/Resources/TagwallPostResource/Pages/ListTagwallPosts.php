<?php

namespace App\Filament\Resources\TagwallPostResource\Pages;

use App\Filament\Resources\TagwallPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagwallPosts extends ListRecords
{
    protected static string $resource = TagwallPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
