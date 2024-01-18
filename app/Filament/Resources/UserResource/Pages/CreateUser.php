<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = static::getModel()::create($data);

        $user->assignRole(UserRole::USER->value);
        $user->avatars()->attach(1, ['active' => 1]);

        return $user;
    }
}
