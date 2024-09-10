<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleSatuanKerjaResource\Pages;
use App\Filament\Resources\RoleSatuanKerjaResource\RelationManagers;
use App\Models\RoleSatuanKerja;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleSatuanKerjaResource extends Resource
{
    protected static ?string $model = RoleSatuanKerja::class;

    protected static ?string $navigationLabel = "Role di Satuan Kerja";
    protected static ?string $pluralModelLabel = "Role di Satuan Kerja";
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = "Manajemen Satuan Kerja";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label("Pengguna")
                    ->relationship("user", "name")
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('kegiatan_id')
                    ->label("Kegiatan")
                    ->relationship("kegiatan", "nama")
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('role')
                    ->relationship("role", "name")
                    ->preload()
                    ->required(),
                Select::make('satuan_kerja_id')
                    ->label("Satuan Kerja")
                    ->preload()
                    ->searchable()
                    ->relationship("satuanKerja", "nama")
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label("Pengguna")
                    ->searchable(),
                Tables\Columns\TextColumn::make('kegiatan.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label("Role")
                    ->searchable(),
                Tables\Columns\TextColumn::make('satuanKerja.nama')
                    ->label("Satuan Kerja")
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
            'index' => Pages\ListRoleSatuanKerjas::route('/'),
            'create' => Pages\CreateRoleSatuanKerja::route('/create'),
            'edit' => Pages\EditRoleSatuanKerja::route('/{record}/edit'),
        ];
    }
}
