<?php

namespace App\Filament\Resources\TestFunctionResource\Pages;

use App\Filament\Resources\TestFunctionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestFunctions extends ListRecords
{
    protected static string $resource = TestFunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
