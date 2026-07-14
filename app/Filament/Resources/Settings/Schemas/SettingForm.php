<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                        Tabs\Tab::make('Ümumi')
                            ->icon('heroicon-m-globe-alt')
                            ->label('Ümumi')
                            ->schema([
                                TextInput::make('site_name')
                                    ->label('Sayt Adı')
                                    ->required()
                                    ->placeholder('Cyber Job')
                                    ->columnSpanFull(),

                                FileUpload::make('logo')
                                    ->label('Sayt Loqosu')
                                    ->image()
                                    ->directory('settings')
                                    ->visibility('public')
                                    ->imageEditor(),

                                FileUpload::make('favicon')
                                    ->label('Favikon')
                                    ->image()
                                    ->directory('settings')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->acceptedFileTypes(['image/png', 'image/x-icon', 'image/vnd.microsoft.icon']),

                                TextInput::make('phone_number')
                                    ->label('Telefon Nömrəsi')
                                    ->placeholder('+994 50 123 45 67'),

                                TextInput::make('mail')
                                    ->label('E-poçt Ünvanı')
                                    ->placeholder('info@jobing.az'),

                                TextInput::make('address')
                                    ->label('Fiziki Ünvan')
                                    ->placeholder('Bakı, Azərbaycan')
                                    ->columnSpanFull(),

                                TextInput::make('working_hours')
                                    ->label('İş Saatları')
                                    ->placeholder('09:00 - 18:00')
                                    ->hint('Nümunə: 09:00 - 18:00'),

                                Textarea::make('about_us->az')
                                    ->label('Haqqımızda (AZ)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Textarea::make('about_us->en')
                                    ->label('About Us (EN)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Textarea::make('about_us->ru')
                                    ->label('О нас (RU)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Tabs\Tab::make('Sosial Media')
                            ->icon('heroicon-m-share')
                            ->label('Sosial Media')
                            ->schema([
                                TextInput::make('whatsapp_number')
                                    ->label('WhatsApp Nömrəsi'),

                                TextInput::make('whatsapp_business_number')
                                    ->label('WhatsApp Business'),

                                TextInput::make('telegram_number')
                                    ->label('Telegram'),

                                TextInput::make('instagram_url')
                                    ->label('Instagram URL'),

                                TextInput::make('facebook_url')
                                    ->label('Facebook URL'),

                                TextInput::make('linkedin_url')
                                    ->label('LinkedIn URL'),

                                TextInput::make('tiktok_url')
                                    ->label('TikTok URL'),

                                TextInput::make('youtube_url')
                                    ->label('YouTube URL'),

                                TextInput::make('twitter_url')
                                    ->label('Twitter / X URL'),
                            ])->columns(2),

                        Tabs\Tab::make('SEO')
                            ->icon('heroicon-m-magnifying-glass-circle')
                            ->label('SEO')
                            ->schema([
                                TextInput::make('seo_title')
                                    ->label('SEO Başlıq')
                                    ->placeholder('Cyber Job - İş Elanları Platforması')
                                    ->columnSpanFull(),

                                Textarea::make('seo_description')
                                    ->label('SEO Təsvir')
                                    ->rows(3)
                                    ->placeholder('Azərbaycanın ən böyük iş elanları platforması')
                                    ->columnSpanFull(),

                                TagsInput::make('seo_keywords')
                                    ->label('SEO Açar Sözlər')
                                    ->placeholder('Açar söz əlavə et')
                                    ->columnSpanFull(),
                            ]),

                        Tabs\Tab::make('Skriptlər')
                            ->icon('heroicon-m-code-bracket')
                            ->label('Skriptlər və İzləmə')
                            ->schema([
                                Textarea::make('header_scripts')
                                    ->label('Başlıq Skriptləri (Google Analytics, Meta Taglar)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Textarea::make('body_scripts')
                                    ->label('Bədən Skriptləri (Pixel Noscript, GTM)')
                                    ->rows(4)
                                    ->columnSpanFull(),

                                Textarea::make('footer_scripts')
                                    ->label('Alt Skriptlər (Xüsusi JS, Söhbət Widgetları)')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull()
            ]);
    }
}
