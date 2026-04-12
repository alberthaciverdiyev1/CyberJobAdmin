<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Settings')
                    ->tabs([
                        // 1. Kontakt ve Lokasyon
                        Tabs\Tab::make('Contact Information')
                            ->icon('heroicon-m-phone')
                            ->schema([
                                TextInput::make('phone_number')
                                    ->label('Phone Number')
                                    ->tel()
                                    ->placeholder('+994 50 123 45 67'),

                                TextInput::make('mail')
                                    ->label('Email Address')
                                    ->email()
                                    ->placeholder('info@jobing.az'),

                                TextInput::make('address')
                                    ->label('Physical Address')
                                    ->placeholder('Baku, Azerbaijan')
                                    ->columnSpanFull(),

                                TextInput::make('working_hours')
                                    ->label('Working Hours')
                                    ->placeholder('09:00 - 18:00')
                                    ->hint('Example: 09:00 - 18:00'),
                            ])->columns(2),

                        // 2. Sosyal Medya & Mesajlaşma
                        Tabs\Tab::make('Social Media')
                            ->icon('heroicon-m-share')
                            ->schema([
                                TextInput::make('whatsapp_number')
                                    ->label('WhatsApp Number')
                                    ->tel()
                                    ->prefix('+'),

                                TextInput::make('whatsapp_business_number')
                                    ->label('WhatsApp Business')
                                    ->tel(),

                                TextInput::make('telegram_number')
                                    ->label('Telegram Number')
                                    ->tel(),

                                TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url()
                                    ->prefix('https://'),

                                TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url()
                                    ->prefix('https://'),

                                TextInput::make('linkedin_url')
                                    ->label('LinkedIn URL')
                                    ->url()
                                    ->prefix('https://'),
                            ])->columns(2),

                        // 3. Scriptler ve SEO
                        Tabs\Tab::make('Scripts & SEO')
                            ->icon('heroicon-m-code-bracket')
                            ->schema([
                                Textarea::make('header_scripts')
                                    ->label('Header Scripts (Google Analytics, Meta Tags)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Textarea::make('body_scripts')
                                    ->label('Body Scripts (Pixel Noscript, GTM)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Textarea::make('footer_scripts')
                                    ->label('Footer Scripts (Custom JS, Chat Widgets)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull()
            ]);
    }
}
