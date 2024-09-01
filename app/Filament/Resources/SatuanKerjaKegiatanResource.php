<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SatuanKerjaKegiatanResource\Pages;
use App\Filament\Resources\SatuanKerjaKegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use App\Models\SatuanKerjaKegiatan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SatuanKerjaKegiatanResource extends Resource
{
    protected static ?string $model = SatuanKerjaKegiatan::class;

    protected static ?string $label = "Kegiatan Satuan Kerja";
    protected static ?string $navigationLabel = "Kegiatan Satuan Kerja";
    protected static ?string $pluralModelLabel = "Kegiatan Satuan Kerja";
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = "Manajemen Kegiatan";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('satuan_kerja_id')
                    ->label("Satuan Kerja")
                    ->searchable()
                    ->preload()
                    ->relationship("satuanKerja","nama")
                    ->required(),
                Select::make('kegiatan_id')
                    ->label("Kegiatan")
                    ->relationship("kegiatan","nama")
                    ->searchable(["nama","id"])
                    ->getOptionLabelFromRecordUsing(function(Kegiatan $record){
                        return $record->namaAndId;
                    })
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('satuanKerja.nama')
                    ->label("Satuan Kerja")
                    ->searchable(),
                TextColumn::make('kegiatan.nama')
                    ->searchable(),
                TextColumn::make('kegiatan.id')
                    ->label("ID Kegiatan")
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
            'index' => Pages\ListSatuanKerjaKegiatans::route('/'),
            'create' => Pages\CreateSatuanKerjaKegiatan::route('/create'),
            'edit' => Pages\EditSatuanKerjaKegiatan::route('/{record}/edit'),
        ];
    }
}
