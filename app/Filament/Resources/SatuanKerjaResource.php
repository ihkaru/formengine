<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SatuanKerjaResource\Pages;
use App\Filament\Resources\SatuanKerjaResource\RelationManagers;
use App\Models\SatuanKerja;
use App\Supports\Constants;
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
use PDO;

class SatuanKerjaResource extends Resource
{
    protected static ?string $model = SatuanKerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                Select::make("level_wilayah_kerja")
                    ->options(Constants::LEVEL_WILAYAH)
                    ->required()
                    ,
                TextInput::make("wilayah_kerja_id")
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("nama")->searchable(),
                TextColumn::make("level_wilayah_kerja")
                    ->label("Level Wilayah Kerja")
                    ->formatStateUsing(function(string $state): string{
                        return Constants::LEVEL_WILAYAH[$state];
                    })
                    ->searchable()
                ,
                TextColumn::make("wilayah_kerja_id")
                    ->label('Kode Wilayah Kerja')
                    ->searchable(),
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
            'index' => Pages\ListSatuanKerjas::route('/'),
            'create' => Pages\CreateSatuanKerja::route('/create'),
            'edit' => Pages\EditSatuanKerja::route('/{record}/edit'),
        ];
    }
}
