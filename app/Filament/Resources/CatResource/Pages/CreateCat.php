<?php

namespace App\Filament\Resources\CatResource\Pages;

use App\Filament\Resources\CatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCat extends CreateRecord
{
    protected static string $resource = CatResource::class;

    // Redirect to index after Create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
