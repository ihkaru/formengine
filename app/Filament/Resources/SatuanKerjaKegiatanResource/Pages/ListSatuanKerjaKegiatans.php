<?php

namespace App\Filament\Resources\SatuanKerjaKegiatanResource\Pages;

use App\Filament\Resources\SatuanKerjaKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSatuanKerjaKegiatans extends ListRecords
{
    protected static string $resource = SatuanKerjaKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
