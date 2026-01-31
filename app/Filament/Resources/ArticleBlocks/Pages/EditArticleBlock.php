<?php

namespace App\Filament\Resources\ArticleBlocks\Pages;

use App\Filament\Resources\ArticleBlocks\ArticleBlockResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArticleBlock extends EditRecord
{
    protected static string $resource = ArticleBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
