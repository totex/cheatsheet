<?php

namespace App\Filament\Resources\ArticleBlocks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;

class ArticleBlockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('article_id')
                    ->relationship('article', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                // TextInput::make('type')
                //     ->required()
                //     ->default('text'),
                Select::make('type')
                    ->options([
                        'text' => 'text',
                        'code' => 'code',
                    ])
                    ->required()
                    ->default('text'),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
