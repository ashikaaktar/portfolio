<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'id')
                    ->default(null),
                TextInput::make('title_en')
                    ->required(),
                TextInput::make('title_bn')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('short_description_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('short_description_bn')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description_bn')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->image(),
                Textarea::make('gallery')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('technologies')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('client')
                    ->default(null),
                TextInput::make('live_url')
                    ->url()
                    ->default(null),
                TextInput::make('github_url')
                    ->url()
                    ->default(null),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                DatePicker::make('completion_date'),
            ]);
    }
}
