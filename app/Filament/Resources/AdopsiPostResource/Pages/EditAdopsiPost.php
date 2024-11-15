<?php

namespace App\Filament\Resources\AdopsiPostResource\Pages;

use App\Filament\Resources\AdopsiPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdopsiPost extends EditRecord
{
    protected static string $resource = AdopsiPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
