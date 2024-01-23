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
use Filament\Tables\Columns\ImageColumn;

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
                ImageColumn::make("file_name")->disk(config('filesystems.default'))->width(150)->height(100)->label("Image"),
                TextColumn::make("status")
                          ->badge()
                          ->color(fn(string $state): string => match ($state) {
                              $state => $state,
                          }),
                TextColumn::make("result")->wrap()->label("Log"),
            ])->defaultSort("created_at", "desc")
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                                           ->options([
                                               'PROCESSING' => 'PROCESSING',
                                               'COMPLETED' => 'COMPLETED',
                                               'FAILED' => 'FAILED',
                                           ]),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
