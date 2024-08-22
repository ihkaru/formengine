<?php

namespace App\Filament\Pages;

use App\Models\Survey;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Page;
use Illuminate\Support\HtmlString;

class RespondentSurvey extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.respondent-survey';

    public $survey;
    public $currentStep = 1;
    public $totalSteps;
    public $formData = [];

    public function mount($surveyId)
    {
        $this->survey = Survey::findOrFail($surveyId);
        $this->totalSteps = $this->survey->questions->count();
    }

    protected function getFormSchema(): array
    {
        $steps = [];

        foreach ($this->survey->questions as $index => $question) {
            $step = Wizard\Step::make("Step " . ($index + 1))
                ->schema($this->getQuestionSchema($question));
            $steps[] = $step;
        }

        return [
            Wizard::make($steps)
                ->submitAction(new HtmlString('<button type="submit">Submit</button>')),
        ];
    }

    protected function getQuestionSchema($question): array
    {
        $componentClass = $this->getComponentClass($question->type);

        return [
            $componentClass::make("question_{$question->id}")
                ->label($question->question)
                ->options($question->options ?? [])
                ->required(),
        ];
    }

    protected function getComponentClass($type): string
    {
        return match ($type) {
            'text' => TextInput::class,
            'number' => TextInput::class,
            'select' => Select::class,
            'multiselect' => Select::class,
            'radio' => Radio::class,
            'checkbox' => CheckboxList::class,
            default => TextInput::class,
        };
    }

    public function submit()
    {
        // Process and save the survey response
        // You can access the form data using $this->form->getState()
    }
}
