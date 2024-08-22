<?php

namespace App\Filament\Resources\TestFunctionResource\Pages;

use App\Filament\Resources\TestFunctionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestFunction extends EditRecord
{
    protected static string $resource = TestFunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
