<?php

namespace App\Filament\Resources\Vacancies\Schemas;

use App\Models\Filter;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VacancyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Əsas Məlumatlar')
                    ->schema([
                        Grid::make(3)->schema([

                            TextInput::make('name')
                                ->label('Vakansiya Adı')
                                ->required()
                                ->maxLength(255),

                            Select::make('company_id')
                                ->label('Şirkət')
                                ->relationship('company', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Select::make('category_id')
                                ->label('Kateqoriya')
                                ->relationship('category', 'name->az')
                                ->required(),
                        ]),

                        Grid::make(3)->schema([
                            Select::make('city_id')
                                ->label('Şəhər')
                                ->relationship('city', 'name->az')
                                ->required(),

                            TextInput::make('email')
                                ->label('Email')
                                ->email(),
                            DateTimePicker::make('expire_date')
                                ->label('Bitmə Tarixi')
                                ->default(now()->addDays(30))
                                ->required(),
                        ]),
                    ])->columnSpanFull(),

                Section::make('Vakansiya Filtrləri')
                    ->schema([
                        Grid::make(2) // 2 sütunlu grid yaradırıq
                        ->schema(function () {
                            $parents = \App\Models\Filter::whereNull('parent_id')->get();

                            $selects = [];

                            foreach ($parents as $parent) {
                                $selects[] = Select::make('filter_group_' . $parent->id)
                                    ->label($parent->name['az'] ?? 'Filtr')
                                    ->options(
                                        \App\Models\Filter::where('parent_id', $parent->id)
                                            ->get()
                                            ->pluck('name.az', 'id')
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->afterStateHydrated(function ($component, $record) use ($parent) {
                                        if ($record) {
                                            $selectedId = $record->filters()
                                                ->where('parent_id', $parent->id)
                                                ->first()?->id;
                                            $component->state($selectedId);
                                        }
                                    })
                                    ->saveRelationshipsUsing(function ($record, $state) use ($parent) {
                                        if ($state) {
                                            $oldFilters = $record->filters()
                                                ->where('parent_id', $parent->id)
                                                ->pluck('filters.id');

                                            $record->filters()->detach($oldFilters);
                                            $record->filters()->attach($state);
                                        }
                                    });
                            }

                            return $selects;
                        }),
                    ])
                    ->columnSpanFull(),
                Section::make('Əmək haqqı və Yaş')
                    ->schema([
                        Grid::make(4)->schema([
                            TextInput::make('min_salary')
                                ->label('Min. Maaş')
                                ->numeric(),
                            TextInput::make('max_salary')
                                ->label('Max. Maaş')
                                ->numeric(),
                            Select::make('min_age')
                                ->label('Min. Yaş')
                                ->options(array_combine(range(16, 80), range(16, 80)))
                                ->searchable(),
                            Select::make('max_age')
                                ->label('Max. Yaş')
                                ->options(array_combine(range(16, 80), range(16, 80)))
                                ->searchable(),
                        ]),
                    ])->columnSpanFull(),

                Section::make('Ətraflı Məlumat')
                    ->schema([
                        FileUpload::make('banner_image')
                            ->label('Banner Şəkli')
                            ->image()
                            ->directory('vacancies/banners')
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            RichEditor::make('requirements')
                                ->label('Tələblər')
                                ->required(),

                            RichEditor::make('description')
                                ->label('Təsvir')
                                ->required(),
                        ]),
                    ])->columnSpanFull(),

                Section::make('Tənzimləmələr')
                    ->schema([
                        Grid::make(4)->schema([
                            Toggle::make('is_active')->label('Aktiv')->default(true)->inline(false),
                            Toggle::make('is_premium')->label('Premium')->inline(false),
                            Toggle::make('is_move_forward')->label('İrəli Çək')->inline(false),
                        ])
                    ])->columnSpanFull(),
            ]);
    }
}
