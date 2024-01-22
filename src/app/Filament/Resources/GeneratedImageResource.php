<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneratedImageResource\Pages;
use App\Filament\Resources\GeneratedImageResource\RelationManagers;
use App\Models\GeneratedImage;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;

class GeneratedImageResource extends Resource
{
    protected static ?string $model = GeneratedImage::class;

    protected static ?string $modelLabel = "Image";

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make("keyword")
                    ->required()
                    ->maxLength(255)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("keyword")
                          ->searchable(),
                TextColumn::make("status")
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    $state => $state,
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            //'create' => Pages\CreateGeneratedImage::route('/create'),
            //'edit' => Pages\EditGeneratedImage::route('/{record}/edit'),
        ];
    }
}
