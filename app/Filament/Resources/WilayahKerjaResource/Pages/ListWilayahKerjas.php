<?php

namespace App\Filament\Resources\WilayahKerjaResource\Pages;

use App\Filament\Resources\WilayahKerjaResource;
use App\Models\Kegiatan;
use App\Models\SatuanKerja;
use App\Models\WilayahKerja;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Resources\Pages\ListRecords;

class ListWilayahKerjas extends ListRecords
{
    protected static string $resource = WilayahKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make("alokasi_petugas")
                ->label("Alokasi Petugas")
                ->form([
                    Select::make("satuanKerja")
                        ->label("Satuan Kerja")
                        ->required()
                        ->searchable()
                        ->preload()
                        ->live()
                        ->options(SatuanKerja::getSatuanKerja()->pluck("nama","id")),
                    Select::make("kegiatan_id")
                        ->searchable()
                        ->hidden(function(Get $get){
                            return !($get("satuanKerja") != null);
                        })
                        ->required()
                        ->preload()
                        ->live()
                        ->options(function(Get $get){
                            Kegiatan::getKegiatan();
                        })
                ])
        ];
    }
}
