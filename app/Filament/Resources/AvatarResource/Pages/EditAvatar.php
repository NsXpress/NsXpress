<?php

namespace App\Filament\Resources\AvatarResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AvatarResource;

class EditAvatar extends EditRecord
{
    protected static string $resource = AvatarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        unset($data['image_girl']);

        if (is_null($data['image'])) {
            unset($data['image']);
        }
        
        $record->update($data);

        return $record;
    }
}
