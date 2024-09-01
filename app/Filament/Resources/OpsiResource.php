<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpsiResource\Pages;
use App\Filament\Resources\OpsiResource\RelationManagers;
use App\Models\Opsi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpsiResource extends Resource
{
    protected static ?string $model = Opsi::class;

    protected static ?string $navigationLabel = "Opsi";
    protected static ?string $pluralModelLabel = "Opsi";
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = "Manajemen Kuesioner";

    public static function canViewAny(): bool{
        return false;
    }
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
            'index' => Pages\ListOpsis::route('/'),
            'create' => Pages\CreateOpsi::route('/create'),
            'edit' => Pages\EditOpsi::route('/{record}/edit'),
        ];
    }
}
