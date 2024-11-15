<?php

namespace App\Filament\Resources\AdopsiPostResource\Pages;

use App\Filament\Resources\AdopsiPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdopsiPost extends CreateRecord
{
    protected static string $resource = AdopsiPostResource::class;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
