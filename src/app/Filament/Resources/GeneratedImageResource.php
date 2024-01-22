<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneratedImageResource\Pages;
use App\Filament\Resources\GeneratedImageResource\RelationManagers;
use App\Models\GeneratedImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeneratedImageResource extends Resource
{
    protected static ?string $model = GeneratedImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListGeneratedImages::route('/'),
            'create' => Pages\CreateGeneratedImage::route('/create'),
            'edit' => Pages\EditGeneratedImage::route('/{record}/edit'),
        ];
    }
}
