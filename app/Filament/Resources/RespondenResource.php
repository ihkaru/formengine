<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RespondenResource\Pages;
use App\Filament\Resources\RespondenResource\RelationManagers;
use App\Models\Responden;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RespondenResource extends Resource
{
    protected static ?string $model = Responden::class;

    protected static ?string $navigationLabel = "Responden";
    protected static ?string $pluralModelLabel = "Responden";
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = "Manajemen Kuesioner";



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kegiatan_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('provinsi_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kabkot_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('kecamatan_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desa_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sls_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('bs_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DateTimePicker::make('terakhir_diisi'),
                Forms\Components\Textarea::make('data')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kegiatan_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kabkot_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desa_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sls_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bs_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('terakhir_diisi')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListRespondens::route('/'),
            'create' => Pages\CreateResponden::route('/create'),
            'edit' => Pages\EditResponden::route('/{record}/edit'),
        ];
    }
}
