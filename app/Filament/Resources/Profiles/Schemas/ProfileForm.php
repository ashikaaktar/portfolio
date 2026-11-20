<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->default('Ashika'),
                TextInput::make('title_en')
                    ->required()
                    ->default('Digital Marketer & Developer'),
                TextInput::make('title_bn')
                    ->required()
                    ->default('ডিজিটাল মার্কেটার এবং ডেভেলপার'),
                TextInput::make('headline_en')
                    ->required()
                    ->default('I Build Digital Experiences & Grow Businesses.'),
                TextInput::make('headline_bn')
                    ->required()
                    ->default('আমি ডিজিটাল প্রযুক্তি ও ক্রিয়েটিভ সলিউশনের মাধ্যমে ব্যবসাকে এগিয়ে নিতে কাজ করি।'),
                Textarea::make('tagline_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('tagline_bn')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('bio_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('bio_bn')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('about_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('about_bn')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('career_goals_en')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('career_goals_bn')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('profile_image')
                    ->image(),
                FileUpload::make('hero_image')
                    ->image(),
                TextInput::make('cv_path')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->default('ashika@example.com'),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('whatsapp_number')
                    ->required()
                    ->default('01938267920'),
                TextInput::make('whatsapp_link')
                    ->required()
                    ->default('https://wa.me/8801938267920'),
                TextInput::make('location_en')
                    ->required()
                    ->default('Dhaka, Bangladesh'),
                TextInput::make('location_bn')
                    ->required()
                    ->default('ঢাকা, বাংলাদেশ'),
                TextInput::make('years_of_experience')
                    ->required()
                    ->numeric()
                    ->default(4),
                TextInput::make('completed_projects')
                    ->required()
                    ->numeric()
                    ->default(45),
                TextInput::make('happy_clients')
                    ->required()
                    ->numeric()
                    ->default(38),
                TextInput::make('satisfaction_rate')
                    ->required()
                    ->numeric()
                    ->default(99),
            ]);
    }
}
