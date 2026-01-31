<?php

namespace App\Filament\Resources\ArticleBlocks;

use App\Filament\Resources\ArticleBlocks\Pages\CreateArticleBlock;
use App\Filament\Resources\ArticleBlocks\Pages\EditArticleBlock;
use App\Filament\Resources\ArticleBlocks\Pages\ListArticleBlocks;
use App\Filament\Resources\ArticleBlocks\Schemas\ArticleBlockForm;
use App\Filament\Resources\ArticleBlocks\Tables\ArticleBlocksTable;
use App\Models\ArticleBlock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArticleBlockResource extends Resource
{
    protected static ?string $model = ArticleBlock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ArticleBlockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArticleBlocksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListArticleBlocks::route('/'),
            'create' => CreateArticleBlock::route('/create'),
            'edit' => EditArticleBlock::route('/{record}/edit'),
        ];
    }
}
