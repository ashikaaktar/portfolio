<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_en')
                    ->required(),
                TextInput::make('title_bn')
                    ->required(),
                TextInput::make('issuer_en')
                    ->required(),
                TextInput::make('issuer_bn')
                    ->required(),
                DatePicker::make('issue_date'),
                DatePicker::make('expiry_date'),
                TextInput::make('credential_id')
                    ->default(null),
                TextInput::make('credential_url')
                    ->url()
                    ->default(null),
                FileUpload::make('badge_image')
                    ->image(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
