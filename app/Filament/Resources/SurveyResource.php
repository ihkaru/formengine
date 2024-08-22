<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyResource\Pages;
use App\Filament\Resources\SurveyResource\RelationManagers;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\DatePicker::make('period'),
                Forms\Components\Repeater::make('questions')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->required(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'number' => 'Number',
                                'select' => 'Select',
                                'multiselect' => 'Multi Select',
                                'radio' => 'Radio',
                                'checkbox' => 'Checkbox',
                            ])
                            ->required(),
                        Forms\Components\Repeater::make('options')
                            ->schema([
                                Forms\Components\TextInput::make('value'),
                            ])
                            ->visible(fn ($get) => in_array($get('type'), ['select', 'multiselect', 'radio', 'checkbox'])),
                    ]),
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
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
        ];
    }
}
