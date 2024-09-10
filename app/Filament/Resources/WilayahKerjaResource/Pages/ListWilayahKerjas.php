<?php

namespace App\Filament\Resources\WilayahKerjaResource\Pages;

use App\Filament\Resources\WilayahKerjaResource;
use App\Models\Kegiatan;
use App\Models\MasterSls;
use App\Models\Organisasi;
use App\Models\SatuanKerja;
use App\Models\WilayahKerja;
use App\Supports\Constants;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;
use PDO;

class ListWilayahKerjas extends ListRecords
{
    protected static string $resource = WilayahKerjaResource::class;
    public static $satuanKerjas = null;
    public static $kegiatan = null;
    public static $satuanKerja = null;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make("alokasi_petugas")
                ->label("Alokasi Petugas")
                ->form(self::getFormAlokasi())
                ->action(function (array $data) {
                    if (WilayahKerja::alokasiPetugas($data)) {
                        Notification::make()
                            ->success()
                            ->title("Sukses mengalokasikan petugas")
                            ->send();
                    } else {
                        Notification::make()
                            ->success()
                            ->title("Gagal mengalokasikan petugas")
                            ->send();
                    };
                })
        ];
    }

    public static function getFormAlokasi()
    {
        $res = [
            Select::make("satuanKerja")
                ->label("Satuan Kerja")
                ->afterStateUpdated(function ($state) {

                    // dd(self::$satuanKerjas);
                })
                ->required()
                ->searchable()
                ->preload()
                ->live()
                ->options(SatuanKerja::getSatuanKerja()->pluck("nama", "id")),
            Select::make("kegiatan_id")
                ->label("Kegiatan")
                ->searchable()
                ->disabled(function (Get $get) {
                    return !($get("satuanKerja") != null);
                })
                ->required(function (Get $get) {
                    return true;
                })
                ->preload()
                ->live()
                ->options(function (Get $get) {
                    return Kegiatan::whereHas("satuanKerjas", function ($q) use ($get) {
                        $q->where("satuan_kerjas.id", $get("satuanKerja"));
                    })->pluck("nama", "id");
                }),
            Select::make("prov_id")
                ->hidden(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    return !($get("kegiatan_id"));
                })
                ->label("Provinsi")
                ->live()
                ->preload()
                ->reactive()
                ->required()
                ->options(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    $res = MasterSls::getProvSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                    return $res;
                }),
            Select::make("kabkot_id")
                ->label("Kabupaten/Kota")
                ->preload()
                ->live()
                ->multiple(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    return self::$kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_KABUPATEN;
                })
                ->hidden(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    return !($get("prov_id") != null) ||
                        collect([
                            Constants::LEVEL_REKAP_PROVINSI
                        ])->contains(self::$kegiatan->level_rekap_1);
                })
                ->required()
                ->options(function (Get $get) {
                    return MasterSls::getKabkotSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("kec_id")
                ->multiple(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    return self::$kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_KECAMATAN;
                })
                ->label("Kecamatan")
                ->preload()
                ->live()
                ->hidden(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    return !($get("kabkot_id") != null) ||
                        collect([
                            Constants::LEVEL_REKAP_PROVINSI,
                            Constants::LEVEL_REKAP_KABUPATEN
                        ])->contains(self::$kegiatan->level_rekap_1);
                })
                ->required()
                ->options(function (Get $get) {
                    return MasterSls::getKecamatanSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("desa_kel_id")
                ->multiple(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    return self::$kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_DESA_KELURAHAN || self::$kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_DESA;
                })
                ->label("Desa/Kelurahan")
                ->preload()
                ->live()
                ->hidden(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    return !($get("kec_id") != null) ||
                        collect([
                            Constants::LEVEL_REKAP_PROVINSI,
                            Constants::LEVEL_REKAP_KABUPATEN,
                            Constants::LEVEL_REKAP_KECAMATAN
                        ])->contains(self::$kegiatan->level_rekap_1);
                })
                ->required()
                ->options(function (Get $get) {
                    return MasterSls::getDesaKelSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("sls_id")
                ->multiple(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    return self::$kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_SLS;
                })
                ->label("Satuan Lingkungan Setempat")
                ->preload()
                ->live()
                ->hidden(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    return !($get("desa_kel_id") != null) ||
                        collect([
                            Constants::LEVEL_REKAP_PROVINSI,
                            Constants::LEVEL_REKAP_KABUPATEN,
                            Constants::LEVEL_REKAP_KECAMATAN,
                            Constants::LEVEL_REKAP_DESA_KELURAHAN,
                            Constants::LEVEL_REKAP_DESA
                        ])->contains(self::$kegiatan->level_rekap_1);
                })
                ->required()
                ->options(function (Get $get) {
                    return MasterSls::getSlsSatker(self::$satuanKerjas->pluck("wilayah_kerja_id"));
                }),
            Select::make("petugas_level_3")
                ->label("Penanggung Jawab")
                ->hidden(function (Get $get) {
                    if ($get('satuanKerja') == null) return true;
                    if ($get('kegiatan_id') == null) return true;
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    return !(self::$kegiatan->petugas_level_3);
                })
                ->live()
                ->required()
                ->options(function (Get $get) {
                    if (!self::$satuanKerjas) return [];
                    return Organisasi::getPetugasSatker(self::$satuanKerjas)->pluck("name", "id");
                }),
            Select::make("petugas_level_2")
                ->label("Pengawas")
                ->live()
                ->required()
                ->options(function (Get $get) {
                    if ($get('satuanKerja') == null) return [];
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    return Organisasi::getPetugasSatker(self::$satuanKerjas)
                        ->whereNot('id', $get('petugas_level_3'))
                        ->pluck("name", "id");
                }),
            Select::make("petugas_level_1")
                ->label("Petugas")
                ->required()
                ->live()
                ->disabled(function (Get $get) {
                    return $get("petugas_level_2") == null;
                })
                ->options(function (Get $get) {
                    if ($get('satuanKerja') == null) return [];
                    if ($get("petugas_level_2") == null) return [];
                    self::$satuanKerja = SatuanKerja::where("id", $get('satuanKerja'))->first();
                    self::$satuanKerjas = SatuanKerja::where("nama", self::$satuanKerja->nama)->get();
                    return Organisasi::getPetugasSatker(self::$satuanKerjas)
                        ->whereNot('id', $get('petugas_level_2'))
                        ->pluck("name", "id");
                }),
            Toggle::make('ganti_petugas')
                ->hidden(function (Get $get) {
                    self::$kegiatan = Kegiatan::where('id', $get('kegiatan_id'))->first();
                    return self::$kegiatan->max_petugas_di_level_1 * 1 != 1;
                })
                ->label("Ganti Petugas")
        ];
        return $res;
    }
}
