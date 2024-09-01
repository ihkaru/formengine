<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RincianResource\Pages;
use App\Filament\Resources\RincianResource\RelationManagers;
use App\Models\Rincian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RincianResource extends Resource
{
    protected static ?string $model = Rincian::class;

    protected static ?string $navigationLabel = "Rincian";
    protected static ?string $pluralModelLabel = "Rincian";
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
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
            'index' => Pages\ListRincians::route('/'),
            'create' => Pages\CreateRincian::route('/create'),
            'edit' => Pages\EditRincian::route('/{record}/edit'),
        ];
    }
}
