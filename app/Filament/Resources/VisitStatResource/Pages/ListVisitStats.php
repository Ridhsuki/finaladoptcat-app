<?php

namespace App\Filament\Resources\VisitStatResource\Pages;

use App\Filament\Resources\VisitStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisitStats extends ListRecords
{
    protected static string $resource = VisitStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
