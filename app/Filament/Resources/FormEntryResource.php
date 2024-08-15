<?php

namespace App\Filament\Resources;

use App\Models\EForm;
use App\Models\FormEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\FormEntryResource\Pages;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

class FormEntryResource extends Resource
{
    protected static ?string $model = FormEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('e_form_id')
                    ->label('Form')
                    ->options(EForm::pluck('title', 'id'))
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('data', [])),
                Grid::make('form_fields')
                    ->schema(function(Get $get,Set $set){
                        $formId = $get('e_form_id');
                        // dd($formId);

                        if (!$formId) return [];

                        // dd($formId);
                        $eForm = EForm::find($formId);

                        $res = collect($eForm->fields)->map(function ($field) use ($get, $set) {

                            $componentClass = match ($field['type']) {
                                'text' => Forms\Components\TextInput::class,
                                'number' => Forms\Components\TextInput::class,
                                'date' => Forms\Components\DatePicker::class,
                                'select' => Forms\Components\Select::class,
                                default => Forms\Components\TextInput::class,
                            };

                            $component = $componentClass::make("data.{$field['label']}")
                                ->label($field['label'])
                                ->required($field['required'] ?? false);

                            if ($field['type'] === 'number') {
                                $component->numeric();
                            }

                            if ($field['type'] === 'select') {
                                $component->options(collect($field['options'] ?? [])->pluck('value', 'value')->toArray());
                            }

                            return $component;
                        })->toArray();
                        return $res;
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('eForm.title'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFormEntries::route('/'),
            'create' => Pages\CreateFormEntry::route('/create'),
            'edit' => Pages\EditFormEntry::route('/{record}/edit'),
        ];
    }
}
