<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganisasiResource\Pages;
use App\Filament\Resources\OrganisasiResource\RelationManagers;
use App\Models\Organisasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganisasiResource extends Resource
{
    protected static ?string $model = Organisasi::class;

    protected static ?string $label = "Organisasi";
    protected static ?string $navigationLabel = "Organisasi";
    protected static ?string $pluralModelLabel = "Organisasi";
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = "Manajemen Satuan Kerja";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kegiatan_id')
                    ->required()
                    ->maxLength(36),
                Forms\Components\TextInput::make('pencacah_id')
                    ->required()
                    ->maxLength(36),
                Forms\Components\TextInput::make('pengawas_id')
                    ->maxLength(36)
                    ->default(null),
                Forms\Components\TextInput::make('koseka_id')
                    ->maxLength(36)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kegiatan.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pencacah.name')
                    ->label("Petugas")
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengawas.name')
                    ->label(
                        "Pemeriksa"
                    )
                    ->searchable(),
                Tables\Columns\TextColumn::make('koseka.name')
                    ->label("Penanggung Jawab")
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
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListOrganisasis::route('/'),
            'create' => Pages\CreateOrganisasi::route('/create'),
            'edit' => Pages\EditOrganisasi::route('/{record}/edit'),
        ];
    }
}
