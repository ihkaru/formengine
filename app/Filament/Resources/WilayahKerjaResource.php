<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WilayahKerjaResource\Pages;
use App\Filament\Resources\WilayahKerjaResource\RelationManagers;
use App\Models\WilayahKerja;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WilayahKerjaResource extends Resource
{
    protected static ?string $model = WilayahKerja::class;

    protected static ?string $label = "Alokasi Petugas";
    protected static ?string $navigationLabel = "Alokasi Petugas";
    protected static ?string $pluralModelLabel = "Alokasi Petugas";
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = "Manajemen Kegiatan";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('petugasLevel1.name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('kegiatan.nama')
                    ->label("Kegiatan")
                    ->required()
                    ->maxLength(255),
                TextInput::make('prov.provinsi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('kec.kecamatan')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('desaKel.desa_kel')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('sls.nama')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('bs_id')
                    ->label("Blok Sensus")
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sls_id')
            ->columns([
                TextColumn::make('petugasLevel1.name')
                    ->label("Petugas Lapangan")
                    ->searchable(),
                TextColumn::make('kegiatan.nama')
                    ->label("Kegiatan")
                    ->searchable(),
                TextColumn::make('prov.provinsi')
                    ->label("Provinsi")
                    ->searchable(),
                TextColumn::make('kec.kecamatan')
                    ->label("Kecamatan")
                    ->searchable(),
                TextColumn::make('desaKel.desa_kel')
                    ->label("Desa/Kelurahan")
                    ->searchable(),
                TextColumn::make('sls.nama')
                    ->label("SLS")
                    ->searchable(),
                TextColumn::make('sls_id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('bs_id')
                    ->label("Blok Sensus")
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
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
            ->actions([])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
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
            'index' => Pages\ListWilayahKerjas::route('/'),
            'create' => Pages\CreateWilayahKerja::route('/create'),
            'edit' => Pages\EditWilayahKerja::route('/{record}/edit'),
        ];
    }
}
