<?php

namespace App\Filament\Resources\WilayahKerjaResource\Pages;

use App\Filament\Resources\WilayahKerjaResource;
use App\Models\Kegiatan;
use App\Models\MasterSls;
use App\Models\Organisasi;
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
    public static $satuanKerjas = null;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make("alokasi_petugas")
                ->label("Alokasi Petugas")
                ->form(self::getFormAlokasi())
        ];
    }

    public static function getFormAlokasi(){
        $res = [
            Select::make("satuanKerja")
                ->label("Satuan Kerja")
                ->required()
                ->searchable()
                ->preload()
                ->live()
                ->options(SatuanKerja::getSatuanKerja()->pluck("nama","id")),
            Select::make("kegiatan_id")
                ->label("Kegiatan")
                ->searchable()
                ->disabled(function(Get $get){
                    return !($get("satuanKerja") != null);
                })
                ->required(function(Get $get){
                    return true;
                })
                ->preload()
                ->live()
                ->options(function(Get $get){
                    return Kegiatan::whereHas("satuanKerjas",function($q)use($get){
                        $q->where("satuan_kerjas.id",$get("satuanKerja"));
                    })->pluck("nama","id");
                })
                ,
            Select::make("prov_id")
                ->hidden(function(Get $get){
                    return !($get("satuanKerja") != null && $get("kegiatan_id"));
                })
                ->label("Provinsi")
                ->live()
                ->preload()
                ->reactive()
                ->required()
                ->options(function(Get $get){
                    $satuanKerja = SatuanKerja::where("id",$get("satuanKerja"))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama",$satuanKerja->nama)->get();
                    $res = MasterSls::getProvSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                    return $res;

                }),
            Select::make("kabkot_id")
                ->label("Kabupaten/Kota")
                ->preload()
                ->live()
                ->hidden(function(Get $get){
                    return !($get("prov_id") != null);
                })
                ->required()
                ->options(function(Get $get){
                    return MasterSls::getKabkotSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("kec_id")
                ->label("Kecamatan")
                ->preload()
                ->live()
                ->hidden(function(Get $get){
                    return !($get("kabkot_id") != null);
                })
                ->required()
                ->options(function(Get $get){
                    return MasterSls::getKecamatanSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("desa_kel_id")
                ->label("Desa/Kelurahan")
                ->preload()
                ->live()
                ->hidden(function(Get $get){
                    return !($get("kec_id") != null);
                })
                ->required()
                ->options(function(Get $get){
                    return MasterSls::getDesaKelSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("petugas_level_1")
                ->label("PPL")
                ->options(function(){
                    return Organisasi::getPetugasSatker(self::$satuanKerjas);
                })
            ];
        return $res;
    }
}
