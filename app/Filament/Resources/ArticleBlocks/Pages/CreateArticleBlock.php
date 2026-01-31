<?php

namespace App\Filament\Resources\ArticleBlocks\Pages;

use App\Filament\Resources\ArticleBlocks\ArticleBlockResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArticleBlock extends CreateRecord
{
    protected static string $resource = ArticleBlockResource::class;
}
