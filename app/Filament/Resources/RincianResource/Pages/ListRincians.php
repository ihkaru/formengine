<?php

namespace App\Filament\Resources\RincianResource\Pages;

use App\Filament\Resources\RincianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRincians extends ListRecords
{
    protected static string $resource = RincianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
