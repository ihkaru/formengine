<?php

namespace App\Filament\Resources\SatuanKerjaUserResource\Pages;

use App\Filament\Resources\SatuanKerjaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSatuanKerjaUser extends EditRecord
{
    protected static string $resource = SatuanKerjaUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
