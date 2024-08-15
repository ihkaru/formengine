<?php

namespace App\Filament\Resources\FormResource\Pages;

use App\Filament\Resources\EFormResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateForm extends CreateRecord
{
    protected static string $resource = EFormResource::class;
}
