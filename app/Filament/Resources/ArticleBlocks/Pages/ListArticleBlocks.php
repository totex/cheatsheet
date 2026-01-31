<?php

namespace App\Filament\Resources\ArticleBlocks\Pages;

use App\Filament\Resources\ArticleBlocks\ArticleBlockResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArticleBlocks extends ListRecords
{
    protected static string $resource = ArticleBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
