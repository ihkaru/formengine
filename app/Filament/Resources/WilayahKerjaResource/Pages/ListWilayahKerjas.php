<?php

namespace App\Filament\Resources\WilayahKerjaResource\Pages;

use App\Filament\Resources\WilayahKerjaResource;
use App\Models\Kegiatan;
use App\Models\WilayahKerja;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ListRecords;

class ListWilayahKerjas extends ListRecords
{
    protected static string $resource = WilayahKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make("assign_petugas")
                ->label("Assign Petugas")
                ->form(self::formAssignPetugas())
        ];
    }
    public static function formAssignPetugas(){
        $kegiatans = Kegiatan::query();
        if(!auth()->user()->hasRole("super_admin")){
            $kegiatans->whereHas("satuanKerjas",function($q){
                $q->whereIn("id",auth()->user()->satuanKerjas->pluck('id')->toArray());
            });
        }


        return [
            Select::make("kegiatan_id")
                ->required()
                ->live()
                ->label("Kegiatan")
                ->options($kegiatans->get()->pluck('nama','id'))
                ->searchable("nama"),

        ];
    }
}
