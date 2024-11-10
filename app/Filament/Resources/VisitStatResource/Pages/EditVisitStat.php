<?php

namespace App\Filament\Resources\VisitStatResource\Pages;

use App\Filament\Resources\VisitStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisitStat extends EditRecord
{
    protected static string $resource = VisitStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
