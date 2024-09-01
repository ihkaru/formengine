<?php

namespace App\Filament\Resources\SatuanKerjaKegiatanResource\Pages;

use App\Filament\Resources\SatuanKerjaKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSatuanKerjaKegiatan extends EditRecord
{
    protected static string $resource = SatuanKerjaKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
