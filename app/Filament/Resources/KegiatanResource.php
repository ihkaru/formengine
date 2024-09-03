<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use App\Supports\Constants;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $label = "Kegiatan";
    protected static ?string $navigationLabel = "Kegiatan";
    protected static ?string $pluralModelLabel = "Kegiatan";
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = "Manajemen Kegiatan";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Pilih Satuan Kerja")
                    ->label("Pilih Satuan Kerja")
                    ->description("Pilih satuan kerja yang melaksanakan kegiatan ini")
                    ->schema([
                        Select::make("satuanKerjas")
                            ->searchable()
                            ->label("Satuan Kerja")
                            ->multiple()
                            ->preload()
                            ->relationship("satuanKerjas","nama")
                    ])
                ,
                Section::make("Metadata Kegiatan")
                    ->label("Metadata Kegiatan")
                    ->description("Informasi mengenai kegiatan yang dilaksanakan")
                    ->schema([
                        TextInput::make('nama')
                            ->helperText("Mohon tuliskan tanpa periode. Contoh: Registrasi Ekonomi Masyarakat")
                            ->required()
                            ->maxLength(255),
                        Select::make("level_pendataan")
                            ->label("Level Pendataan")
                            ->options(Constants::LEVEL_PENDATAAN)
                            ->required(),
                        TextInput::make('tahun')
                            ->numeric()
                            ->length(4)
                            ->required()
                            ->numeric(),
                        Select::make('frekuensi')
                            ->options(Constants::JENIS_FREKUENSI)
                            ->required(),
                        TextInput::make('seri')
                            ->numeric()
                            ->helperText("Jika tahunan, gunakan nilai 1. Jika Triwulanan, sesuaikan dengan nomor triwulannya. Begitu juga bulanan, subround, dll. ")
                            ->minValue(1)
                            ->maxValue(12)
                            ->required()
                            ->maxLength(255),
                        TextInput::make('subkategori')
                            ->helperText("Digunakan jika kegiatan punya subkategori. Misal lapangan, pengolahan, UTL, UPB, dll.")
                            ->maxLength(255)
                            ->default(null),
                        TextInput::make('kode_subkategori')
                            ->label("Kode Subkategori")
                            ->helperText("Gunakan kode singkat untuk mewakili subkategori. Misal, subkategori pengolahan maka kodenya OLAH")
                            ->maxLength(255)
                            ->default(null),
                        TextInput::make('id')
                            ->label("ID Kegiatan")
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('tgl_mulai')
                            ->label("Tanggal Mulai Kegiatan")
                            ->required()
                        ,
                        DatePicker::make('tgl_selesai')
                            ->label("Tanggal Selesai Kegiatan")
                            ->required()
                        ,
                        DatePicker::make('tgl_tutup')
                            ->label("Tanggal Tutup Kegiatan")
                            ->required()
                        ,
                        Select::make('level_rekap_1')
                            ->label("Rekapitulasi Level 1")
                            ->options(Constants::LEVEL_REKAP)
                            ->required(),
                        Select::make('level_rekap_2')
                            ->label("Rekapitulasi Level 2")
                            ->options(Constants::LEVEL_REKAP)
                            ->required(),
                        Select::make('level_assignment')
                            ->label("Level Assignment Terkecil")
                            ->options(Constants::LEVEL_ASSIGNMENT)
                            ->required(),
                        Select::make('unit_observasi')
                            ->label("Unit Observasi")
                            ->options(Constants::LEVEL_UNIT_OBSERVASI)
                            ->required(),
                        Select::make('unit_sampel')
                            ->label("Unit Sampel")
                            ->options(Constants::LEVEL_UNIT_SAMPEL)
                            ->required(),
                        Select::make("petugas_level_1")
                            ->label("Petugas Level 1")
                            ->required()
                            ->options(Constants::JABATAN_LEVEL_1)
                            ->helperText("Petugas yang mengunjungi responden secara langsung")
                        ,
                        Select::make("petugas_level_2")
                            ->label("Petugas Level 2")
                            ->required()
                            ->options(Constants::JABATAN_LEVEL_2)
                            ->helperText("Petugas yang memeriksa isian petugas level 1")
                        ,
                        Select::make("petugas_level_3")
                            ->label("Petugas Level 3")
                            ->options(Constants::JABATAN_LEVEL_3)
                            ->helperText("Petugas yang memjadi ketua petugas level 2")
                        ,


                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('tgl_mulai',"desc")
            ->columns([
                TextColumn::make('id')
                    ->label('ID Kegiatan')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('tahun')
                    ->sortable(),
                TextColumn::make('frekuensi')
                    ->formatStateUsing(fn($state)=>Constants::JENIS_FREKUENSI[$state])
                    ->searchable(),
                TextColumn::make('seri')
                    ->searchable(),
                TextColumn::make("level_pendataan")
                    ->sortable()
                    ->label("Level Pendataan")
                    ->formatStateUsing(fn($state)=>Constants::LEVEL_PENDATAAN[$state])
                ,
                TextColumn::make('tgl_mulai')
                    ->label("Tanggal Mulai Kegiatan")
                    ->date()
                    ->sortable(),
                TextColumn::make('tgl_selesai')
                    ->label("Tanggal Selesai Kegiatan")
                    ->date()
                    ->sortable(),
                TextColumn::make('tgl_tutup')
                    ->label("Tanggal Tutup Kegiatan")
                    ->date()
                    ->sortable(),
                TextColumn::make('level_rekap_1')
                    ->formatStateUsing(fn($state)=>Constants::LEVEL_REKAP[$state])
                    ->label("Rekapitulasi Level 1")
                    ->searchable(),
                TextColumn::make('level_rekap_2')
                    ->formatStateUsing(fn($state)=>Constants::LEVEL_REKAP[$state])
                    ->label("Rekapitulasi Level 2")
                    ->searchable(),
                TextColumn::make('level_assignment')
                    ->formatStateUsing(fn($state)=>Constants::LEVEL_ASSIGNMENT[$state])
                    ->label("Level Assignment Terkecil")
                    ->searchable(),
                TextColumn::make('unit_observasi')
                    ->formatStateUsing(fn($state)=>Constants::LEVEL_UNIT_OBSERVASI[$state])
                    ->label("Unit Observasi")
                    ->searchable(),
                TextColumn::make('unit_sampel')
                    ->formatStateUsing(fn($state)=>Constants::LEVEL_UNIT_SAMPEL[$state])
                    ->label("Unit Sampel")
                    ->searchable(),
                TextColumn::make('subkategori')
                    ->searchable(),
                TextColumn::make('kode_subkategori')
                    ->label("Kode Subkategori")
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('petugas_level_1')
                    ->label("Petugas Level 1")
                    ->formatStateUsing(fn($state)=>Constants::JABATAN_LEVEL_1[$state])
                    ,
                TextColumn::make('petugas_level_2')
                    ->label("Petugas Level 2")
                    ->formatStateUsing(fn($state)=>Constants::JABATAN_LEVEL_2[$state])
                    ,
                TextColumn::make('petugas_level_3')
                    ->label("Petugas Level 3")
                    ->formatStateUsing(fn($state)=>Constants::JABATAN_LEVEL_3[$state])
                    ,
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
