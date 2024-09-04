<?php

namespace App\Filament\Resources\RoleSatuanKerjaResource\Pages;

use App\Filament\Resources\RoleSatuanKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoleSatuanKerjas extends ListRecords
{
    protected static string $resource = RoleSatuanKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
