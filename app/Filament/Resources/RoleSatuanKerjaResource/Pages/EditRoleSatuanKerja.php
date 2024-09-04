<?php

namespace App\Filament\Resources\RoleSatuanKerjaResource\Pages;

use App\Filament\Resources\RoleSatuanKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoleSatuanKerja extends EditRecord
{
    protected static string $resource = RoleSatuanKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
