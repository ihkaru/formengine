<?php

namespace App\Filament\Resources\SatuanKerjaResource\Pages;

use App\Filament\Resources\SatuanKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSatuanKerjas extends ListRecords
{
    protected static string $resource = SatuanKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
