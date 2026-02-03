<?php

namespace App\Filament\Resources\Articles\Schemas;

use Dom\Text;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->relationship('section', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('sub_title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Repeater::make('content')
                    ->schema([
                        TextInput::make('content_title')
                            ->label('Content Title')
                            ->required(),
                        RichEditor::make('content_body')
                            ->label('Content Body')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->label('Article Contents')
                    ->minItems(1)
                    ->required(),

                // MarkdownEditor::make('content')
                //     ->required()
                //     ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')->default(true),
                Toggle::make('is_public')->default(false),
            ]);
    }
}
