<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_en')
                    ->required(),
                TextInput::make('title_bn')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description_bn')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->required()
                    ->default('sparkles'),
                Textarea::make('features_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('features_bn')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('tag_en')
                    ->default(null),
                TextInput::make('tag_bn')
                    ->default(null),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
