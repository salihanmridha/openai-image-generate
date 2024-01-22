<?php

namespace App\Filament\Resources\GeneratedImageResource\Pages;

use App\Filament\Resources\GeneratedImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneratedImages extends ListRecords
{
    protected static string $resource = GeneratedImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
