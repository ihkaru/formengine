<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatStatusResource\Pages;
use App\Filament\Resources\RiwayatStatusResource\RelationManagers;
use App\Models\RiwayatStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiwayatStatusResource extends Resource
{
    protected static ?string $model = RiwayatStatus::class;

    protected static ?string $navigationLabel = "Riwayat Status Responden";
    protected static ?string $pluralModelLabel = "Riwayat Status Responden";
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = "Manajemen Kuesioner";

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
            'index' => Pages\ListRiwayatStatuses::route('/'),
            'create' => Pages\CreateRiwayatStatus::route('/create'),
            'edit' => Pages\EditRiwayatStatus::route('/{record}/edit'),
        ];
    }
}
