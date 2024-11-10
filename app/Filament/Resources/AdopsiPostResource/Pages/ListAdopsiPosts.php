<?php

namespace App\Filament\Resources\AdopsiPostResource\Pages;

use App\Filament\Resources\AdopsiPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdopsiPosts extends ListRecords
{
    protected static string $resource = AdopsiPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
