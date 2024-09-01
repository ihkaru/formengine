<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SatuanKerjaUserResource\Pages;
use App\Filament\Resources\SatuanKerjaUserResource\RelationManagers;
use App\Models\SatuanKerjaUser;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SatuanKerjaUserResource extends Resource
{
    protected static ?string $model = SatuanKerjaUser::class;

    protected static ?string $navigationLabel = "Pengguna di Satuan Kerja";
    protected static ?string $pluralModelLabel = "Pengguna di Satuan Kerja";
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = "Manajemen Satuan Kerja";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('satuan_kerja_id')
                    ->searchable()
                    ->preload()
                    ->relationship("satuanKerja","nama")
                    ->required(),
                Select::make('user_id')
                    ->relationship("user","name")
                    ->searchable(["nama","email"])
                    ->getOptionLabelFromRecordUsing(function(User $record){
                        return $record->nameAndEmail;
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('satuanKerja.nama')
                    ->label("Satuan Kerja")
                    ->searchable(),
                TextColumn::make('user.email')
                    ->label("Email User")
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label("Nama User")
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
            'index' => Pages\ListSatuanKerjaUsers::route('/'),
            'create' => Pages\CreateSatuanKerjaUser::route('/create'),
            'edit' => Pages\EditSatuanKerjaUser::route('/{record}/edit'),
        ];
    }
}
