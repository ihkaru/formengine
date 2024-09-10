<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SatuanKerjaResource\Pages;
use App\Filament\Resources\SatuanKerjaResource\RelationManagers;
use App\Filament\Resources\SatuanKerjaResource\RelationManagers\UsersRelationManager;
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

    protected static ?string $label = "Satuan Kerja";
    protected static ?string $navigationLabel = "Satuan Kerja";
    protected static ?string $pluralModelLabel = "Satuan Kerja";
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = "Manajemen Satuan Kerja";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                Select::make("level_wilayah_kerja")
                    ->label("Level Wilayah Kerja")
                    ->helperText("Merupakan level wilayah yang menjadi tanggung jawab satuan kerja")
                    ->options(Constants::LEVEL_WILAYAH)
                    ->required(),
                TextInput::make("wilayah_kerja_id")
                    ->label("ID Wilayah Kerja")
                    ->helperText("Mengacu kepada Master SLS Badan Pusat Statistik")
                    ->required(),
                Select::make("users")
                    ->label("Pengguna")
                    ->multiple()
                    ->relationship("users", "email")
                    ->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("nama")->searchable(),
                TextColumn::make("level_wilayah_kerja")
                    ->label("Level Wilayah Kerja")
                    ->formatStateUsing(function (string $state): string {
                        return Constants::LEVEL_WILAYAH[$state];
                    })
                    ->searchable(),
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
            UsersRelationManager::class
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
