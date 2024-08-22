<?php

namespace App\Filament\Resources\TestFunctionResource\Pages;

use App\Filament\Resources\TestFunctionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestFunction extends CreateRecord
{
    protected static string $resource = TestFunctionResource::class;
}
