<?php

namespace App\Filament\Resources\AvatarResource\Pages;

use App\Filament\Resources\AvatarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAvatar extends CreateRecord
{
    protected static string $resource = AvatarResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['image'] = basename($data['image']);
        unset($data['image_girl']);

        return $data;
    }
}
