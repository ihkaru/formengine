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

    protected static ?string $label = "Alokasi Petugas";
    protected static ?string $navigationLabel = "Alokasi Petugas";
    protected static ?string $pluralModelLabel = "Alokasi Petugas";
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = "Manajemen Kegiatan";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('petugas_level_1_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kegiatan_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('prov_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kec_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desa_kel_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sls_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('bs_id')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('petugas_level_1_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kegiatan_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prov_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kec_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desa_kel_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sls_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bs_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListWilayahKerjas::route('/'),
            'create' => Pages\CreateWilayahKerja::route('/create'),
            'edit' => Pages\EditWilayahKerja::route('/{record}/edit'),
        ];
    }
}
