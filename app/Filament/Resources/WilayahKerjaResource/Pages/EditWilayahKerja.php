<?php

namespace App\Filament\Resources\WilayahKerjaResource\Pages;

use App\Filament\Resources\WilayahKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWilayahKerja extends EditRecord
{
    protected static string $resource = WilayahKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
