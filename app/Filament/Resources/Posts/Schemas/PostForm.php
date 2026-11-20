<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
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
                Textarea::make('excerpt_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('excerpt_bn')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('content_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('content_bn')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('featured_image')
                    ->image(),
                TextInput::make('reading_time')
                    ->required()
                    ->default('5 min read'),
                Toggle::make('is_published')
                    ->required(),
                DateTimePicker::make('published_at'),
                TextInput::make('meta_title')
                    ->default(null),
                Textarea::make('meta_description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
