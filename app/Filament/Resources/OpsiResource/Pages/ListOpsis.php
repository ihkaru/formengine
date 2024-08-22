<?php

namespace App\Filament\Resources\OpsiResource\Pages;

use App\Filament\Resources\OpsiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpsis extends ListRecords
{
    protected static string $resource = OpsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
