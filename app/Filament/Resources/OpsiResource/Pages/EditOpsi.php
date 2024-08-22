<?php

namespace App\Filament\Resources\OpsiResource\Pages;

use App\Filament\Resources\OpsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpsi extends EditRecord
{
    protected static string $resource = OpsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
