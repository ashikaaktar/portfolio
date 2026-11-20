<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution_en')
                    ->required(),
                TextInput::make('institution_bn')
                    ->required(),
                TextInput::make('degree_en')
                    ->required(),
                TextInput::make('degree_bn')
                    ->required(),
                TextInput::make('field_of_study_en')
                    ->default(null),
                TextInput::make('field_of_study_bn')
                    ->default(null),
                TextInput::make('period_en')
                    ->default(null),
                TextInput::make('period_bn')
                    ->default(null),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                TextInput::make('grade')
                    ->default(null),
                Textarea::make('description_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description_bn')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
