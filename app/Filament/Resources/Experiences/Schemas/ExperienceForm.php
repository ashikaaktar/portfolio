<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_en')
                    ->required(),
                TextInput::make('company_bn')
                    ->required(),
                TextInput::make('role_en')
                    ->required(),
                TextInput::make('role_bn')
                    ->required(),
                TextInput::make('location_en')
                    ->default(null),
                TextInput::make('location_bn')
                    ->default(null),
                TextInput::make('type_en')
                    ->required()
                    ->default('Full-Time'),
                TextInput::make('type_bn')
                    ->required()
                    ->default('ফুল-টাইম'),
                TextInput::make('period_en')
                    ->default(null),
                TextInput::make('period_bn')
                    ->default(null),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                Toggle::make('is_current')
                    ->required(),
                Textarea::make('description_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description_bn')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('achievements_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('achievements_bn')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
