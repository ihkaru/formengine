<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WilayahKerjaResource\Pages;
use App\Filament\Resources\WilayahKerjaResource\RelationManagers;
use App\Models\WilayahKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WilayahKerjaResource extends Resource
{
    protected static ?string $model = WilayahKerja::class;

    protected static ?string $navigationLabel = "Alokasi Petugas";
    protected static ?string $pluralModelLabel = "Alokasi Petugas";
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = "Manajemen Kegiatan";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListWilayahKerjas::route('/'),
            'create' => Pages\CreateWilayahKerja::route('/create'),
            'edit' => Pages\EditWilayahKerja::route('/{record}/edit'),
        ];
    }
}
