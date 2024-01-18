<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Avatar;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AvatarResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AvatarResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AvatarResource extends Resource
{
    protected static ?string $model = Avatar::class;
    protected static ?string $navigationIcon = 'heroicon-o-face-smile';
    protected static ?string $navigationGroup = 'Community';

    public static function form(Form $form): Form
    {
        $avatarFileName = time() . '-' . random_int(1,9999999);
        
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Male avatar image')
                    ->columnSpanFull()
                    ->image()
                    ->directory('images/community/avatars/male')
                    ->previewable(true)
                    ->getUploadedFileNameForStorageUsing(fn (TemporaryUploadedFile $file) => $avatarFileName . '.' . $file->getClientOriginalExtension()),
                Forms\Components\FileUpload::make('image_girl')
                    ->label('Female avatar image')
                    ->columnSpanFull()
                    ->image()
                    ->directory('images/community/avatars/female')
                    ->previewable(true)
                    ->getUploadedFileNameForStorageUsing(fn (TemporaryUploadedFile $file) => $avatarFileName . '.' . $file->getClientOriginalExtension()),
                Forms\Components\TextInput::make('price')
                    ->columnSpanFull()
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_public')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_public')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAvatars::route('/'),
            'create' => Pages\CreateAvatar::route('/create'),
            'edit' => Pages\EditAvatar::route('/{record}/edit'),
        ];
    }    
}
